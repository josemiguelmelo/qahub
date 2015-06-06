function passwordsMatch() {
    var password = $("#password").val();
    var password_conf = $("#password_conf").val();

    if(password != password_conf) {
        bootbox.alert("Passwords do not match");
        return false;
    }
    return true;
}
