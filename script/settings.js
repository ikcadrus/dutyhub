let language = document.querySelector(".language-menu"),
    links = document.querySelectorAll(".flags");

let englishTexts = {
    ".duties-nav": "Duties",
    ".calendar-nav": "Calendar",
    ".weather-nav": "Weather",
    ".settings-nav": "Settings",
    ".english-nav": "English",
    ".polish-nav": "Polish",
    ".sign-in-nav": "Sign In",
    ".edit-header": "Edit Duty",
    ".duty-header": "Face Your Duty",
    ".floating-duty": "Change your duty",
    ".floating-text": "Insert your duty",
    ".floating-weather": "Insert your city",
    ".importance-text": "Choose the importance of duty",
    ".low": "Low importance",
    ".medium": "Medium importance",
    ".high": "High importance",
    ".btn-submit": "Submit",
    ".manage-duty": "Manage duties",
    ".btn-save": "Save",
    ".btn-back": "Back",
    ".about-text": "Easy-to-use application that will help you organize your daily tasks",
    ".contact": "Contact Us",
    ".contact-text": "We are available on the following social media",
    ".calendar-name": "Basic Calendar",
    ".mon": "Mon",
    ".tue": "Tue",
    ".wed": "Wed",
    ".thu": "Thu",
    ".fri": "Fri",
    ".sat": "Sat",
    ".sun": "Sun",
    ".weather-name": "Weather API",
    ".information-name": "You must first search for the place",
    ".error-name": "Invalid city name"
};

let polishTexts = {
    ".duties-nav": "Obowiązki",
    ".calendar-nav": "Kalendarz",
    ".weather-nav": "Pogoda",
    ".settings-nav": "Ustawienia",
    ".english-nav": "Angielski",
    ".polish-nav": "Polski",
    ".sign-in-nav": "Zaloguj się",
    ".edit-header": "Edytuj zadanie",
    ".duty-header": "Staw czoła obowiązkom",
    ".floating-duty": "Zmień swoje zadanie",
    ".floating-text": "Podaj swoje zadanie",
    ".floating-weather": "Podaj nazwę miejsca",
    ".importance-text": "Wybierz ważność obowiązku",
    ".low": "Małe znaczenie",
    ".medium": "Średnie znaczenie",
    ".high": "Duże znaczenie",
    ".manage-duty": "Zarządzanie obowiązkami",
    ".btn-submit": "Dodaj",
    ".btn-save": "Zapisz",
    ".btn-back": "Cofnij",
    ".about-text": "Łatwa w użyciu aplikacja, która pomoże ci zorganizować codzienne zadania",
    ".contact": "Skontaktuj się z nami",
    ".contact-text": "Jesteśmy dostępni w następujących mediach społecznościowych",
    ".calendar-name": "Zwyczajny kalendarz",
    ".mon": "Pon",
    ".tue": "Wt",
    ".wed": "Śr",
    ".thu": "Czw",
    ".fri": "Pt",
    ".sat": "Sob",
    ".sun": "Ndz",
    ".weather-name": "Prognoza pogody",
    ".information-name": "Musisz najpierw wyszukać miejsce",
    ".error-name": "Nieprawidłowa nazwa miejsca"
};

links.forEach(lang => {
    lang.addEventListener("click", () => {
        links.forEach(link => {
            link.classList.remove("active");
        });
        lang.classList.add("active");
        let attr = lang.getAttribute("language");
        let texts = (attr === "english") ? englishTexts : polishTexts;
        for (let selector in texts) {
            let element = document.querySelector(selector);
            if (element) {
                element.textContent = texts[selector];
            }
        }
    });
    
});


function changeColorMode(){

    var logo = document.getElementById("logo_navbar");
    var navbarID = document.getElementById("navbarID");
    document.body.classList.toggle("dark-theme");

    if(document.body.classList.contains("dark-theme")){
        logo.src = "img/logo/logo-dark.svg";
        navbarID.classList.add('border-dark');
    }else{
        logo.src = "img/logo/logo-light.svg";
        navbarID.classList.remove('border-dark');
    }

}

function changeColorMode2(){

    var logo = document.getElementById("logo_navbar");
    var navbarID = document.getElementById("navbarID");
    document.body.classList.toggle("dark-theme");

    if(document.body.classList.contains("dark-theme")){
        logo.src = "img/logo/logo-dark.svg";
        navbarID.classList.add('border-dark');

    }else{
        logo.src = "img/logo/logo-light.svg";
        navbarID.classList.remove('border-dark');
    }

}