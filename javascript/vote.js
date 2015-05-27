$(document).ready(function() {
    $(".fa-thumbs-o-up").click(function(){
        var contentid = $(this).data("id");
        var value = $(this).data("value");
        var next = $(this).next();
        $.ajax({
            url : BASE_URL + "api/vote/vote.php",
            type: "POST",
            data : {content_id: contentid, value: value},
            success: function(data, textStatus, jqXHR)
            {
                if(data.error == false){
                    var votes = data.classification;
                    next.text(votes);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                bootbox.alert("Please login in order to vote.");
            }
        });
    });

    $(".fa-thumbs-o-down").click(function(){
        var contentid = $(this).data("id");
        var value = $(this).data("value");
        var previous = $(this).prev();
        $.ajax({
            url : BASE_URL + "api/vote/vote.php",
            type: "POST",
            data : {content_id: contentid, value: value},
            success: function(data, textStatus, jqXHR)
            {
                if(data.error == false){
                    var votes = data.classification;
                    previous.text(votes);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                bootbox.alert("Please login in order to vote.");
            }
        });
    });

});
