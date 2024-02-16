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
