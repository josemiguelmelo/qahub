$(document).ready(function() {
    $("#followUser").click(function(){
        var followerId = $(this).data("id");
        var followValue = $(this).data("value");
        var button = $(this);

        $.ajax({
            url : BASE_URL + "api/user/follow.php",
            type: "POST",
            data : {follow: followValue, user_follow_id: followerId},
            success: function(data, textStatus, jqXHR)
            {
                if(data.error == false){
                    if(data.value == false) {
                        button.text("Unfollow user");
                        button.data("value", false);
                    }
                    else {
                        button.text("Follow user");
                        button.data("value", true);
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                bootbox.alert("Please login in order to follow user.");
            }
        });
    });


});
