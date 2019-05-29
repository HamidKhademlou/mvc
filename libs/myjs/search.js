$("#searchform").submit(function (e) {
    var form = $(this);
    var url = form.attr('action');
    // console.log(window.location.href);
    
    if (url.includes("mvc/admin")) { // only for admin panel search
    $.ajax({
        type: "GET",
        url: url,
        data: form.serialize(), // word to search
        success: function (data) {
            $('.trsearchhide').hide();
            $.each(JSON.parse(data), function (indexInArray, valueOfElement) {
                $('#tr-' + valueOfElement.id).show();
            });
        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
    }
});

$(document).ajaxStart(function () {
    $(".loader").css("display", "block");
});
$(document).ajaxComplete(function () {
    $(".loader").css("display", "none");
});