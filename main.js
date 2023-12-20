window.onload = function() {
    check_afk();
}

var check_afk = function() {
    var lastTimeEvent;
    window.onload = resetAfkTimer();
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
}