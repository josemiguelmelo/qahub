$(document).ready(function() {
    $("#promoteQuestion").click(function(){
        var questionId = $(this).data("id");
        $.ajax({
            url : BASE_URL + "api/question/promote.php",
            type: "POST",
            data : {question_id: questionId},
            success: function(data, textStatus, jqXHR)
            {
                $("#promoteModal").modal("hide");
                if(data.error == false){
                    bootbox.alert("Question promoted successfully.");
                    $("#"+questionId).remove();
                }else{
                    if(data.type == 'IF'){
                        bootbox.alert("Insufficient funds.");
                    }else{
                        bootbox.alert("Could not promote question.");
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                bootbox.alert("Could not promote question.");
            }
        });
    });


});
