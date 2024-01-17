// const language_section = document.getElementById('.language-menu');
// const buttons = docuemnt.querySelectorAll('.flags');
// const text_duties = document.getElementById('.duties_nav');
// const text_settings = document.getElementById('.settings_nav');
// const text_language = document.getElementById('.language-nav');
// const text_english = document.getElementById('.english_nav');
// const text_polish = document.getElementById('.polish_nav');
// const text_dark_mode = document.getElementById('.dark_mode_nav');
// const text_sign_in = document.getElementById('.sign_in_nav');
// const text_about_app = document.getElementById('.about_app');

// buttons.forEach(button => {
//     button.addEventListener('click', () => {
//         language_section.querySelector('active').classList.remove('active');
//         button.classList.add('active');

//         const sth = button.getAttribute('language');

//         text_duties.textContent = data_navbar[sth].duties_nav;
//         text_settings.textContent = data_navbar[sth].settings_nav;
//         text_language.textContent = data_navbar[sth].language-option;
//         text_english.textContent = data_navbar[sth].english_nav;
//         text_polish.textContent = data_navbar[sth].polish_nav;
//         text_dark_mode.textContent = data_navbar[sth].dark_mode_nav;
//         text_sign_in.textContent = data_navbar[sth].sign_in_nav;
//         text_about_app.textContent = data_navbar[sth].about_app;
//     })
// })

// function changeLanguage(){

//     var data_navbar = {
        
//         "english":
//         {
//             "duties_nav": "Duties",
//             "settings_nav": "Settings",
//             "language_nav": "Language",
//             "english_nav": "English",
//             "polish_nav": "Polish",
//             "dark_mode_nav": "Dark mode",
//             "sign_in_nav": "Sign In",
//             "about_app": "Easy-to-use application that will help you organize your daily tasks"
//         },
//         "polish":
//         {
//             "duties_nav": "Zadania",
//             "settings_nav": "Ustawienia",
//             "language_nav": "Język",
//             "english_nav": "Angielskki",
//             "polish_nav": "Polski",
//             "dark_mode_nav": "Tryb ciemny",
//             "sign_in_nav": "Zaloguj się",
//             "about_app": "Łatwa w użyciu aplikacja, która pomoże ci zorganizować codzienne zadania"
//         }
//     }

// }

function changeColorMode(){

    var colorMode = document.getElementById("flexSwitchCheckDefault");
    var logo = document.getElementById("logo_navbar");
    var logoCenter = document.getElementById("logo_center");
    var navbarID = document.getElementById("navbarID");
    document.body.classList.toggle("dark-theme");

    if(document.body.classList.contains("dark-theme")){
        logo.src = "img/logo/logo-dark.svg";
        logoCenter.src = "img/logo/logo-dark.svg";
        navbarID.classList.add('border-dark');

    }else{
        logo.src = "img/logo/logo-light.svg";
        logoCenter.src = "img/logo/logo-light.svg";
        navbarID.classList.remove('border-dark');
    }

}

function changeColorMode2(){

    var colorMode = document.getElementById("flexSwitchCheckDefault");
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