//var intervalId = window.setInterval(check_afk,1000);
/*window.onload(check_afk())
var check_afk = function() {
    var lastTimeEvent;
    //window.onload = resetAfkTimer();
    document.onmousemove = resetAfkTimer();
    document.onmousedown = resetAfkTimer();
    document.ontouchstart = resetAfkTimer();
    document.onkeydown = resetAfkTimer();
    document.onclick = resetAfkTimer();

    function logout() {
        alert("Vous êtes déconnectés.");
    }

    function resetAfkTimer() {
        clearTimeout(lastTimeEvent);
        lastTimeEvent = setTimeout(logout, 3000);
    }
}*/

var inactivityTime = function () {
    var time;
    window.onload = resetTimer;
    // DOM Events
    document.onmousemove = resetTimer;
    document.onkeydown = resetTimer;

    function logout() {
        alert("You are now logged out.")
        //location.href = 'logout.html'
    }

    function resetTimer() {
        clearTimeout(time);
        time = setTimeout(logout, 3000)
        // 1000 milliseconds = 1 second
    }
};