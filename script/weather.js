const calendar = document.querySelector(".calendar"),
date = document.querySelector(".date"),
daysContainer = document.querySelector(".days"),
prev = document.querySelector(".prev"),
next = document.querySelector(".next");

let thisDay;
let today = new Date();
let month = today.getMonth();
let year = today.getFullYear();

const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

function basicCalendar(){

    const firstDay = new Date(year, month, 0);
    const lastDay = new Date(year, month+1, 0);
    const prevLastDay = new Date(year, month, 0);
    const prevDays = prevLastDay.getDate();
    const lastDate = lastDay.getDate();
    const day = firstDay.getDay();
    const nextDays = 7 - lastDay.getDay();

    date.innerHTML = months[month] + " " + year;

    let days = "";

    for(let x = day; x > 0; x--){
        days += `<div class="day prev-date ">${prevDays - x + 1}</div>`;
    }

    for(let y = 1; y <= lastDate; y++){

        if(y === new Date().getDate() && month === new Date().getMonth() && year === new Date().getFullYear()){
            days += `<div class="day today ">${y}</div>`;
        }else{
            days += `<div class="day ">${y}</div>`;
        }

    }

    for(let z = 1; z <= nextDays; z++){

        days += `<div class="day next-date ">${z}</div>`;

    }

    daysContainer.innerHTML = days;
}

basicCalendar();

function prevMonth(){
    month--;
    if(month < 0){
        month = 11;
        year--;
    }
    basicCalendar();
}

function nextMonth(){
    month++;
    if(month > 11){
        month = 0;
        year++;
    }
    basicCalendar();
}

prev.addEventListener("click", prevMonth);
next.addEventListener("click", nextMonth);

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
const weatherIcon = document.querySelector(".weather-icon");

async function checkWeather(city){

    const response = await fetch(apiUrl + city + `&appid=${apiKey}`);

    if(response.status == 404){
        document.querySelector(".error").style.display = "flex";
        document.querySelector(".weather-section").style.display = "none";
        document.querySelector(".information").style.display = "none";
    }else{

        var data = await response.json();

        console.log(data);

        document.querySelector(".city").innerHTML = data.name;
        document.querySelector(".temperature").innerHTML = Math.round(data.main.temp) + '°C';
        document.querySelector(".humidity").innerHTML = data.main.humidity + '%';
        document.querySelector(".wind").innerHTML = Math.round(data.wind.speed) + ' km/h';

        if(data.weather[0].main == 'Clouds'){
            weatherIcon.src = "img/weather/cloudy-icon.svg";
        }
        else if(data.weather[0].main == 'Clear'){
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

        document.querySelector(".weather-section").style.display = "block";
        document.querySelector(".information").style.display = "none";
        document.querySelector(".error").style.display = "none";

    }

    
}

searchButton.addEventListener("click", ()=>{
    
    checkWeather(searchBox.value);

})

