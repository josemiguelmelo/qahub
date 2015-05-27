$(document).ready(function(){
    
    $('.comment').keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) { //enter key
            e.preventDefault();
            e.stopPropagation();
            $(this).closest('form').submit();
        }
    });
    
});