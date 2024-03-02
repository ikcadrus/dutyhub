function whenInputFocus(){

    var input = document.getElementById('floating-weather')
    var button = document.getElementById('button-section');
    button.style.border = '1px solid #ff0000';
    button.style.boxShadow = 'inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6)';

}

function whenInputNotFocus(){

    var input = document.getElementById('floating-weather')
    var button = document.getElementById('button-section');
    button.style.border = '1px solid #dee2e6';
    button.style.boxShadow = 'none';

}

const apiKey = "e285d7fab5ac96f98a47f755842f9582";
const apiUrl = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=";

const searchBox = document.querySelector(".search-bar input");
const searchButton = document.querySelector(".search-bar button");
const englishButton = document.getElementById("english_id");
const polishButton = document.getElementById("polish_id");
const weatherIcon = document.querySelector(".weather-icon");


async function getCityTime(cityName){
    try{
        const response = await fetch(`${apiUrl}${cityName}&appid=${apiKey}`);
        if(!response.ok){
            throw new Error('error');
        }
        const data = await response.json();
        const timezoneOffset = data.timezone;
        const currentUtcTime = new Date();
        const cityTime = new Date(currentUtcTime.getTime() + timezoneOffset * 1000);
        return cityTime;
    } catch (error) {
        console.error('error2');
    }
}

async function checkWeather(city){

    const response = await fetch(apiUrl + city + `&appid=${apiKey}`);
    const currentHour = new Date().getHours();

    if(response.status == 404){
        document.querySelector(".error").style.display = "flex";
        document.querySelector(".weather-section").style.display = "none";
        document.querySelector(".information").style.display = "none";
    }else{

        var data = await response.json();
        console.log(data);
        document.querySelector(".city").innerHTML = data.name;
        document.querySelector(".temperature").innerHTML = Math.round(data.main.temp) + '°C';

        const timezoneOffset = data.timezone;
        const currentHourInCity = new Date((new Date().getTime() + timezoneOffset * 1000)).getHours(); 

        if(data.weather[0].main == 'Clouds') {
            if (data.clouds.all > 80) {
                weatherIcon.src = "img/weather/dark-cloudy-icon.svg";
            } else if (data.clouds.all > 24) {
                weatherIcon.src = "img/weather/full-cloudy-icon.svg";
            } else {
                if (currentHourInCity >= 6 && currentHourInCity < 18) {
                    weatherIcon.src = "img/weather/cloudy-icon.svg";
                } else {
                    weatherIcon.src = "img/weather/moon-cloudy-icon.svg";
                }
            }
        }else if(currentHourInCity >= 6 && currentHourInCity < 18){

            if(data.weather[0].main == 'Clear'){
                weatherIcon.src = "img/weather/sunny-icon.svg";
            }
            else if(data.weather[0].main == 'Rain'){
                weatherIcon.src = "img/weather/rain-icon.svg";
            }
            else if(data.weather[0].main == 'Drizzle'){
                weatherIcon.src = "img/weather/drizzle-icon.svg";
            }
            else if(data.weather[0].main == 'Mist'){
                weatherIcon.src = "img/weather/mist-icon.svg";
            }
            else if(data.weather[0].main == 'Snow'){
                weatherIcon.src = "img/weather/snow-icon.svg";
            }
            else if(data.weather[0].main == 'Thunderstorm'){
                weatherIcon.src = "img/weather/thunder-icon.svg";
            }

            }else{
            
            if(data.weather[0].main == 'Clear'){
                weatherIcon.src = "img/weather/moon-icon.svg";
            }
            else if(data.weather[0].main == 'Rain'){
                weatherIcon.src = "img/weather/rain-icon.svg";
            }
            else if(data.weather[0].main == 'Drizzle'){
                weatherIcon.src = "img/weather/moon-drizzle-icon.svg";
            }
            else if(data.weather[0].main == 'Mist'){
                weatherIcon.src = "img/weather/mist-icon.svg";
            }
            else if(data.weather[0].main == 'Snow'){
                weatherIcon.src = "img/weather/snow-icon.svg";
            }
            else if(data.weather[0].main == 'Thunderstorm'){
                weatherIcon.src = "img/weather/thunder-icon.svg";
            }

        }

        document.querySelector(".weather-section").style.display = "block";
        document.querySelector(".information").style.display = "none";
        document.querySelector(".error").style.display = "none";

    }   
}

searchButton.addEventListener("click", ()=>{
    
    checkWeather(searchBox.value);

})

async function showDate(cityName){

    const days = { 
        "english": ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],
        "polish": ["Ndz","Pon","Wt","Śr","Czw","Pt","Sob"] 
    };
    const months = {
        "english": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        "polish": ["Sty", "Lut", "Mar", "Kwi", "Maj", "Cze", "Lip", "Sie", "Wrze", "Paź", "Lis", "Gru"]
    };

    const language = document.querySelector(".flags").classList.contains("active") ? "english" : "polish";

    try {
        const cityHour = await getCityTime(cityName);
        const currentCityTime = await getCityTime(cityName);

        const timezoneOffset = currentCityTime.getTimezoneOffset();
        currentCityTime.setMinutes((currentCityTime.getMinutes()) + timezoneOffset);
        const dayOfWeek = days[language][currentCityTime.getDay()];
        const dayOfMonth = currentCityTime.getDate();
        const monthOfYear = months[language][currentCityTime.getMonth()];
        const year = currentCityTime.getFullYear();
        const currentHour = currentCityTime.getHours();
        const currentMinutes = currentCityTime.getMinutes().toString().padStart(2, '0');

        return `${dayOfWeek}, ${dayOfMonth} ${monthOfYear} ${year} ${currentHour}:${currentMinutes}`;
    } catch (error) {
        console.error('Error while fetching city time:', error);
        return '';
    }
}

searchButton.addEventListener("click", async () => {
    const cityName = searchBox.value.trim();
    const dateElement = document.querySelector(".date");
    dateElement.textContent = await showDate(cityName);
});

document.addEventListener('DOMContentLoaded', () => {
    englishButton.addEventListener("click", async () => {
        const cityName = searchBox.value.trim();
        const dateElement = document.querySelector(".date");
        dateElement.textContent = await showDate(cityName);
    });

    polishButton.addEventListener("click", async () => {
        const cityName = searchBox.value.trim();
        const dateElement = document.querySelector(".date");
        dateElement.textContent = await showDate(cityName);
    });
});


async function getHourlyWeather(city, apiKey) {

    const url = `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=${apiKey}&units=metric`;

    try {
        const response = await fetch(url);
        const data = await response.json();
        const timezoneOffset = data.city.timezone; 
        const hourlyWeather = data.list.slice(0, 8);
        checkHourlyWeather(hourlyWeather, timezoneOffset); 
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}

function checkHourlyWeather(hourlyWeather, timezoneOffset){

    const hourlyWeatherContainer = document.querySelector(".hourly");
    hourlyWeatherContainer.innerHTML = '';

    hourlyWeather.forEach(hour => {
        
        const hourElement = document.createElement('div');
        hourElement.classList.add('hourly-weather-section', 'col-1');

        const unixTimestamp = hour.dt + timezoneOffset;
        const hourOfDay = new Date(unixTimestamp * 1000).getHours();

        const timeElement = document.createElement('div');
        timeElement.classList.add('hourly-time');
        timeElement.innerHTML = `<h6 class="time">${hourOfDay + ':00'}</h6>`;
        hourElement.appendChild(timeElement);

        const iconElement = document.createElement('div');
        iconElement.classList.add('hourly-icon');

        
        if(hour.weather[0].main == 'Clouds') {
            if (hour.clouds.all > 80) {
                iconElement.innerHTML = `<img src="img/weather/dark-cloudy-icon.svg" class="hourly-weather-icon">`;
            } else if (hour.clouds.all > 24) {
                iconElement.innerHTML = `<img src="img/weather/full-cloudy-icon.svg" class="hourly-weather-icon">`;
            } else {
                if (hourOfDay >= 6 && hourOfDay < 18) {
                    iconElement.innerHTML = `<img src="img/weather/cloudy-icon.svg" class="hourly-weather-icon">`;
                } else {
                    iconElement.innerHTML = `<img src="img/weather/moon-cloudy-icon.svg" class="hourly-weather-icon">`;
                }
            }
        }else if(hourOfDay >= 6 && hourOfDay < 18){

            if(hour.weather[0].main == 'Clear'){
                iconElement.innerHTML = `<img src="img/weather/sunny-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Rain'){
                iconElement.innerHTML = `<img src="img/weather/rain-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Drizzle'){
                iconElement.innerHTML = `<img src="img/weather/drizzle-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Mist'){
                iconElement.innerHTML = `<img src="img/weather/mist-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Snow'){
                iconElement.innerHTML = `<img src="img/weather/snow-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Thunderstorm'){
                iconElement.innerHTML = `<img src="img/weather/thunder-icon.svg" class="hourly-weather-icon">`;
            }

            }else{
            
            if(hour.weather[0].main == 'Clear'){
                iconElement.innerHTML = `<img src="img/weather/moon-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Rain'){
                iconElement.innerHTML = `<img src="img/weather/rain-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Drizzle'){
                iconElement.innerHTML = `<img src="img/weather/moon-drizzle-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Mist'){
                iconElement.innerHTML = `<img src="img/weather/mist-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Snow'){
                iconElement.innerHTML = `<img src="img/weather/snow-icon.svg" class="hourly-weather-icon">`;
            }
            else if(hour.weather[0].main == 'Thunderstorm'){
                iconElement.innerHTML = `<img src="img/weather/thunder-icon.svg" class="hourly-weather-icon">`;
            }

        }
        
        hourElement.appendChild(iconElement);

        const temperatureElement = document.createElement('div');   
        temperatureElement.classList.add('hourly-temperature');
        temperatureElement.innerHTML = `<p class="hourly-temperature">${Math.round(hour.main.temp)}°</p>`;
        hourElement.appendChild(temperatureElement);

        hourlyWeatherContainer.appendChild(hourElement);
    });

}

async function getDailyWeather(city, apiKey){

    const url = `https://api.openweathermap.org/data/2.5/forecast/?q=${city}&appid=${apiKey}&units=metric`;

    try {
        const response = await fetch(url);
        const data = await response.json();
        const timezoneOffset = data.city.timezone; 
        const dailyWeather = data.list.filter((item, index) => index % 8 === 0);
        checkDailyWeather(dailyWeather, timezoneOffset); 
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }

}

function checkDailyWeather(dailyWeather, timezoneOffset){

    const days = { 
        "english": ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],
        "polish": ["Ndz","Pon","Wt","Śr","Czw","Pt","Sob"] 
    };

    const dailyWeatherContainer = document.querySelector(".daily");
    dailyWeatherContainer.innerHTML = '';

    dailyWeather.forEach(day => {

        const dayElement = document.createElement('div');
        dayElement.classList.add('daily-weather-section', 'col-1');
        console.log(day);

        const unixTimestamp = day.dt + timezoneOffset;
        const dateOfDay = new Date(unixTimestamp * 1000);
        const hourOfDay = new Date(unixTimestamp * 1000).getHours();
        const dayOfWeekIndex = dateOfDay.getDay();

        const language = document.querySelector(".flags").classList.contains("active") ? "english" : "polish";
        const dayOfWeek = days[language][dayOfWeekIndex];

        const timeElement = document.createElement('div');
        timeElement.classList.add('daily-time');
        timeElement.innerHTML = `<h6 class="time">${dayOfWeek}</h6>`
        dayElement.appendChild(timeElement);

        const iconElement = document.createElement('div');
        iconElement.classList.add('daily-icon');

        if(day.weather[0].main == 'Clouds') {
            if (day.clouds.all > 80) {
                iconElement.innerHTML = `<img src="img/weather/dark-cloudy-icon.svg" class="daily-weather-icon">`;
            } else if (day.clouds.all > 24) {
                iconElement.innerHTML = `<img src="img/weather/full-cloudy-icon.svg" class="daily-weather-icon">`;
            } else {
                if (hourOfDay >= 6 && hourOfDay < 18) {
                    iconElement.innerHTML = `<img src="img/weather/cloudy-icon.svg" class="daily-weather-icon">`;
                } else {
                    iconElement.innerHTML = `<img src="img/weather/moon-cloudy-icon.svg" class="daily-weather-icon">`;
                }
            }
        }else if(hourOfDay >= 6 && hourOfDay < 18){

            if(day.weather[0].main == 'Clear'){
                iconElement.innerHTML = `<img src="img/weather/sunny-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Rain'){
                iconElement.innerHTML = `<img src="img/weather/rain-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Drizzle'){
                iconElement.innerHTML = `<img src="img/weather/drizzle-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Mist'){
                iconElement.innerHTML = `<img src="img/weather/mist-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Snow'){
                iconElement.innerHTML = `<img src="img/weather/snow-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Thunderstorm'){
                iconElement.innerHTML = `<img src="img/weather/thunder-icon.svg" class="daily-weather-icon">`;
            }

            }else{
            
            if(day.weather[0].main == 'Clear'){
                iconElement.innerHTML = `<img src="img/weather/moon-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Rain'){
                iconElement.innerHTML = `<img src="img/weather/rain-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Drizzle'){
                iconElement.innerHTML = `<img src="img/weather/moon-drizzle-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Mist'){
                iconElement.innerHTML = `<img src="img/weather/mist-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Snow'){
                iconElement.innerHTML = `<img src="img/weather/snow-icon.svg" class="daily-weather-icon">`;
            }
            else if(day.weather[0].main == 'Thunderstorm'){
                iconElement.innerHTML = `<img src="img/weather/thunder-icon.svg" class="daily-weather-icon">`;
            }

        }

        dayElement.appendChild(iconElement);

        const dayTemperature = Math.round(day.main.temp_max);
        const nightTemperature = Math.round(day.main.temp_min);

        const temperatureElement = document.createElement('div');
        temperatureElement.classList.add('daily-temperature');
        temperatureElement.innerHTML = `<p class="daily-temperature-day">${dayTemperature}°</p>&nbsp;<p class="daily-temperature-night">${nightTemperature}°</p>`

        dayElement.appendChild(temperatureElement);

        dailyWeatherContainer.appendChild(dayElement);

    })

}

searchButton.addEventListener("click", async () => {
    
    const cityName = searchBox.value.trim();
    await getHourlyWeather(cityName, apiKey);
    await getDailyWeather(cityName, apiKey);

});

searchBox.addEventListener("keyup", async function(event) {

    if (event.keyCode === 13) {
        event.preventDefault();
        searchButton.click();
        const cityName = searchBox.value.trim();
        await getHourlyWeather(cityName, apiKey);
        await getDailyWeather(cityName, apiKey);
    }
    
});

document.addEventListener('DOMContentLoaded', () => {
    englishButton.addEventListener("click", async () => {
    
        const cityName = searchBox.value.trim();
        await getHourlyWeather(cityName, apiKey);
        await getDailyWeather(cityName, apiKey);

    });

    polishButton.addEventListener("click", async () => {
    
        const cityName = searchBox.value.trim();
        await getHourlyWeather(cityName, apiKey);
        await getDailyWeather(cityName, apiKey);

    });
});