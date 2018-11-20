$(":input").focusin(function(){
    $(this).parent().css( "border-left", "5px solid #ffc107" );
});
$(":input").focusout(function(){
    $(this).parent().css( "border-left", "none" );
});