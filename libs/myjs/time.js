$(document).ready(function () {
    var mytime = setInterval(updateClock, 1000)

    function updateClock() {
        var time = new Date();
        var hour = time.getHours();
        var min = time.getMinutes();
        var sec = time.getSeconds();
        min = (min < 10 ? "0" : "") + min;
        sec = (sec < 10 ? "0" : "") + sec;
        var timeOfDay = (hour < 12) ? "AM" : "PM";
        hour = (hour > 12) ? hour - 12 : hour;
        hour = (hour == 0) ? 12 : hour;
        var currentTime = hour + ":" + min + ":" + sec + " " + timeOfDay;
        $("#clock").html(currentTime);
    }
});