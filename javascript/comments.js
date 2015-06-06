$(document).ready(function(){
    
    $('.comment').keypress(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) { //enter key
            e.preventDefault();
            e.stopPropagation();
            if($(this).val() != "")
                $(this).closest('form').submit();
            else bootbox.alert("Comment cannot be empty");
        }
    });
    
});