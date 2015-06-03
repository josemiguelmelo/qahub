$(document).ready(function() {

    $(".fa-trash").click(function () {
        var contentid = $(this).data("id");
        var tableRow = $("#"+contentid);
        console.log("Value",contentid);

        $.ajax({
            url: BASE_URL + "actions/messages/delete.php",
            type: "POST",
            data: {content_id: contentid},
            success: function (data, textStatus, jqXHR) {
                if (data.error == false) {
                    tableRow.remove();
                }
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
            }
        });
    });


    $("#create-message").click(function () {
        var to_id = $("#to_email").val();
        var subject = $("#subject").val();
        var message = $("#message").val();

        console.log(to_id);
        console.log(subject);
        console.log(message);

        $.ajax({
            url: BASE_URL + "actions/messages/create.php",
            type: "POST",
            data: {
                to_id: to_id,
                subject: subject,
                message: message
            },
            success: function (data, textStatus, jqXHR) {
                console.log("Success");
                window.location.replace(BASE_URL+"/pages/users/messages.php");
            },
            error: function (data, textStatus, jqXHR) {
                console.log(data);
                var errorDiv = $(".normalheader");
                errorDiv.after("<div class='normalheader'> <div id='error_messages'><div class='alert alert-danger'>The destination user does not exists</div></div></div>");
            }
        });
    });

});