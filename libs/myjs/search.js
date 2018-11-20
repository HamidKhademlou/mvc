$("#searchform").submit(function (e) {
    var form = $(this);
    var url = form.attr('action');
console.log(url)
    $.ajax({
        type: "GET",
        url: url,
        data: form.serialize(),
        success: function (data) {
            $('.trsearchhide').hide();
            $.each(JSON.parse(data), function (indexInArray, valueOfElement) {
                $('#tr-' + valueOfElement.id).show();
            });
        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});

$(document).ajaxStart(function () {
    $(".loader").css("display", "block");
});
$(document).ajaxComplete(function () {
    $(".loader").css("display", "none");
});