<script>
    var BASE_URL = "{$BASE_URL}";
</script>
<!-- Vendor scripts -->
<script src="{$BASE_URL}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{$BASE_URL}/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="{$BASE_URL}/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{$BASE_URL}/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="{$BASE_URL}/vendor/iCheck/icheck.min.js"></script>
<script src="{$BASE_URL}/vendor/sparkline/index.js"></script>
<script src="{$BASE_URL}/vendor/bootbox.min.js"></script>


<!-- App scripts -->
<script src="{$BASE_URL}/javascript/qahub.js"></script>

<script src="{$BASE_URL}/javascript/vote.js"></script>

<script src="{$BASE_URL}/javascript/youtube.js"></script>

<script src="{$BASE_URL}/javascript/comments.js"></script>

<script src="{$BASE_URL}/javascript/messages.js"></script>
<script src="{$BASE_URL}/javascript/favouritequestion.js"></script>
<script src="{$BASE_URL}/javascript/bootstrap-tagsinput.js"></script>


</body>
</html>

{php}
    unset($_SESSION['oldinput']);
    unset($_SESSION['error_messages']);
    unset($_SESSION['success_messages']);
{/php}