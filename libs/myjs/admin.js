$("button").click(function (e) {
    var idClicked = e.target.id;
    var buttonid = idClicked.split("-");
    var afterchangetext = $('#dropdownMenuButton' + buttonid[1]).html();
    var dropdownMenuButton = "dropdownMenuButton" + buttonid[1];

    if (buttonid[0] == "delete") {
        $.ajax({
            url: 'http://localhost/hamid/mvc/admin/delete/?id=' + buttonid[1],
            success: function (data) {
                $('#tr-' + buttonid[1]).remove();
            },
            type: 'GET'
        });
    }
    if (buttonid[0] == "Admin") {
        $.ajax({
            url: 'http://localhost/hamid/mvc/admin/access/?id=' + buttonid[1] + '&&typeuser=' + buttonid[0],
            success: function (data) {
                $('#' + dropdownMenuButton).html("Admin");
                $("#dropdownMenuButton"+buttonid[1]).addClass("btn-success");
                $("#dropdownMenuButton"+buttonid[1]).removeClass("btn-primary btn-danger");
                $('#' + idClicked).html(afterchangetext);
                $('#' + idClicked).attr("id", afterchangetext + "-" + buttonid[1]);
            },
            type: 'GET'
        });
    }
    if (buttonid[0] == "normal") {
        $.ajax({
            url: 'http://localhost/hamid/mvc/admin/access/?id=' + buttonid[1] + '&&typeuser=' + buttonid[0],
            success: function (data) {
                $('#' + dropdownMenuButton).html("normal");
                $("#dropdownMenuButton"+buttonid[1]).addClass("btn-primary");
                $("#dropdownMenuButton"+buttonid[1]).removeClass("btn-success btn-danger");
                $('#' + idClicked).html(afterchangetext);
                $('#' + idClicked).attr("id", afterchangetext + "-" + buttonid[1]);
            },
            type: 'GET'
        });
    }
    if (buttonid[0] == "notactive") {
        $.ajax({
            url: 'http://localhost/hamid/mvc/admin/access/?id=' + buttonid[1] + '&&typeuser=' + buttonid[0],
            success: function (data) {
                $('#' + dropdownMenuButton).html("notactive");
                $("#dropdownMenuButton"+buttonid[1]).addClass("btn-danger");
                $("#dropdownMenuButton"+buttonid[1]).removeClass("btn-primary btn-success");
                $('#' + idClicked).html(afterchangetext);
                $('#' + idClicked).attr("id", afterchangetext + "-" + buttonid[1]);
            },
            type: 'GET'
        });
    }
});

$(".dropdown-toggle").each(function(){
    if($(this).html()=="Admin"){
        $(this).addClass("btn-success");
        $(this).removeClass("btn-primary btn-danger");
    }
    if($(this).html()=="normal"){
        $(this).addClass("btn-primary");
        $(this).removeClass("btn-success btn-danger");
    }
    if($(this).html()=="notactive"){
        $(this).addClass("btn-danger");
        $(this).removeClass("btn-primary btn-success");
    }
 });


$(document).ajaxStart(function () {
    $(".loader").css("display", "block");
});
$(document).ajaxComplete(function () {
    $(".loader").css("display", "none");
});