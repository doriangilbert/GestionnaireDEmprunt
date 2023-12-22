const timeAway = 5000;
const refreshTime = 1000;
var timeBeforeAFK = 5000;
var addTime = false;

setInterval(function () {
    window.onload = check(); //Lorsque la page s'actualise, on regarde si l'utilisateur est AFK ou non
    window.addEventListener('click', resetAfkTimer);
    window.addEventListener('mousedown', resetAfkTimer);
    window.addEventListener('mousemove', resetAfkTimer);

    function resetAfkTimer() {
        console.log("user input");
        addTime = true;
    }

    function check() {
        if (addTime == false) {
            timeBeforeAFK -= refreshTime;
            console.log("time before away state : " + timeBeforeAFK);
        }
        if (addTime == true) {
            timeBeforeAFK = timeAway;
            console.log("time before away state : " + timeBeforeAFK);
        }
        if (timeBeforeAFK <= 0) {
            console.log("user is away");
            document.getElementById('display_status').style.backgroundColor = "#ffa600"; //Orange
        } else if (timeBeforeAFK > 0) {
            console.log("user is active");
            document.getElementById('display_status').style.backgroundColor = "#00ff33"; //Vert
        }
    }

    addTime = false; //On réinitialise car l'utilisateur peut devenir afk dès la prochaine seconde
}, refreshTime);