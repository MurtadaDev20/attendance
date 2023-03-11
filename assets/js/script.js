    
    function clock() {
    const fullDate = new Date();
    let hours = fullDate.getHours();
    let minutes = fullDate.getMinutes();
    let seconds = fullDate.getSeconds();
    let date = fullDate.toLocaleDateString('ar-EG', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    let period = "AM";

    if (hours == 0) {
        hours = 12;
    } else if (hours > 12) {
        hours = hours - 12;
        period = "PM";
    } else if (hours == 12) {
        period = "PM";
    }

    if (hours < 10) {
        hours = "0" + hours;
    }

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    if (seconds < 10) {
        seconds = "0" + seconds;
    }

    document.querySelector('.hour').innerHTML = hours;
    document.querySelector('.minute').innerHTML = minutes;
    document.querySelector('.second').innerHTML = seconds;
    document.querySelector('.period').innerHTML = period;
    document.querySelector('.date').innerHTML = date;
    }

setInterval(clock, 1000);



