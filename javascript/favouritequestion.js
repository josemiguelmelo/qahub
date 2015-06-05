$(document).ready(function() {
    $("#setFavouriteQuestion").click(function(){
        var questionId = $(this).data("id");
        var value = $(this).data("value");
        var button = $(this);
        console.log("here");
        $.ajax({
            url : BASE_URL + "api/question/favourite.php",
            type: "POST",
            data : {question_id: questionId, value: value},
            success: function(data, textStatus, jqXHR)
            {
                if(data.error == false){
                    button.data("value", data.value);
                    if(data.value == 0)
                        button.attr("class", "fa fa-star-o");
                    else
                        button.attr("class", "fa fa-star");

                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                bootbox.alert("Please login in order to favourite.");
            }
        });
    });


});
