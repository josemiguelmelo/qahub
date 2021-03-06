$(document).ready(function () {
    var errors = 0;
    var messagesDeleted = 0;

    $(".fa-trash").click(function () {
        var contentid = $(this).data("id");
        var tableRow = $("#" + contentid);
        console.log("Value", contentid);

        $.ajax({
            url: BASE_URL + "actions/messages/delete.php",
            type: "POST",
            data: {content_id: contentid},
            success: function (data, textStatus, jqXHR) {
                if (data.error == false) {
                    tableRow.remove();
                    if (messagesDeleted == 0) {
                        var succDiv = $("#success_messages");
                        console.log(succDiv);
                        if (succDiv.length) {
                            succDiv.after("<div class='alert alert-success'>Message deleted</div>");
                            messagesDeleted++;
                        } else {
                            var errorDiv = $(".normalheader");
                            errorDiv.before("<div class='normalheader'> <div id='success_messages'><div class='alert alert-success'>Message deleted</div></div></div>");
                            messagesDeleted++;
                        }
                    }
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

        if(to_id == "" || subject == "" || message == "") {
            bootbox.alert("All fields are required");
        }
        else{
            if(subject.length > 20)
                bootbox.alert("Subject must have a maximum of 20 characters");
            else if(message.length > 70)
                bootbox.alert("Message must have a maximum of 70 characters");
            else {
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
                        window.location.replace(BASE_URL + "pages/users/messages.php");
                    },
                    error: function (data, textStatus, jqXHR) {
                        console.log(data);
                        if (errors == 0) {
                            var errorDiv = $(".normalheader");
                            errorDiv.after("<div class='normalheader'> <div id='error_messages'><div class='alert alert-danger'>The destination user does not exists</div></div></div>");
                            errors++;
                        }
                    }
                });
            }
        }


    });

});