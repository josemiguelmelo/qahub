$(document).ready(function() {
    $("#donateToUserButton").click(function(){
        var toId = $(this).data("id");
        var amount = $("#donationValue").val();
        $.ajax({
            url : BASE_URL + "api/user/donate.php",
            type: "POST",
            data : {to_id: toId, amount: amount},
            success: function(data, textStatus, jqXHR)
            {
                if(data.error == false){
                    bootbox.alert("Donation completed.");
                }else{
                    if(data.type == 'IF'){
                        bootbox.alert("Insufficient funds.");
                    }else if(data.type == 'NVD'){
                        bootbox.alert(data.msg);
                    }
                    else{
                        bootbox.alert("Could not donate.");
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

                bootbox.alert("Could not donate.");
            }
        });
    });


});
