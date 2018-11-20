$("#getuser").click(function () {
    $.get('http://localhost/hamid/mvc/site/getusers', function (data) {
        $("#table1").append("<table class=\"table tablejson table-bordered table-hover\"><thead class=\"thead-dark\"><tr><th scope=\"col\">#</th><th scope=\"col\">id</th><th scope=\"col\">firstname</th><th scope=\"col\">lastname</th><th scope=\"col\">username</th><th scope=\"col\">password</th><th scope=\"col\">email</th><th scope=\"col\">role</th></tr></thead>");
        var i = 0;
        console.log(data);
        $.each(data, function (indexInArray, valueOfElement) {
            i++
            $(".tablejson").append("<tr>");
            $(".tablejson").append("<td>" + i + "</td>");
            $(".tablejson").append("<td>" + valueOfElement.id + "</td>");
            $(".tablejson").append("<td>" + valueOfElement.firstname + "</td>");
            $(".tablejson").append("<td>" + valueOfElement.lastname + "</td>");
            $(".tablejson").append("<td>" + valueOfElement.username + "</td>");
            $(".tablejson").append("<td>" + valueOfElement.password + "</td>");
            $(".tablejson").append("<td>" + valueOfElement.email + "</td>");
            $(".tablejson").append("<td>" + valueOfElement.typeuser + "</td>");
            $(".tablejson").append("</tr>");
        });
        $("#table1").append("</table>");

        // post
        // $.post('http://localhost/hamid/mvc/site/getusers', 'test=ali', function (data) {
        // alert(data.test);
    }, 'json')
});

$("#api").click(function () {
    var myVar = setInterval(myTimer, 3000);

    function myTimer() {
        // var d = new Date();
        // var t = d.toLocaleTimeString();
        // alert(t);
        $.ajax({
            url: 'http://worldclockapi.com/api/json/utc/now',
            success: function (data) {
                $(".table2").html(data.currentDateTime);
                if ($('#r1').is(":checked")) {
                    // clearInterval(myVar);
                    setTimeout(myTimer)
                }
            },
            type: 'GET'
        });
    }
});

$(document).ajaxStart(function () {
    $(".loader").css("display", "block");
});
$(document).ajaxComplete(function () {
    $(".loader").css("display", "none");
});