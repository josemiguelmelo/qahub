{include file='common/header.tpl'}

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>PLEASE LOGIN TO ASK A QUESTION</h3>
                <small>This is the best place to have doubts!</small>
            </div>
            <div class="hpanel login-box">
                <div class="panel-body">
                    <div id="error_messages">
                        {foreach $ERROR_MESSAGES as $error}
                            <div class="alert alert-danger">{$error}</div>
                        {/foreach}
                    </div>
                    <div id="success_messages">
                        {foreach $SUCCESS_MESSAGES as $success}
                            <div class="alert alert-success">{$success}</div>
                        {/foreach}
                    </div>
                    <form action="{$BASE_URL}actions/users/login.php" id="loginForm" method="post">
                        <div class="form-group">
                            <label class="control-label" for="email">E-mail</label>
                            <input type="email" placeholder="example@gmail.com" title="Please enter you email" required="" value="{$smarty.session.oldinput.email}" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control" required>
                        </div>
                        <button class="btn btn-success btn-block">Login</button>
                        <a class="btn btn-default btn-block" href="{$BASE_URL}pages/users/register.php">Register</a>
                        <a class="btn btn-default btn-block" href="{$BASE_URL}pages/users/recovery_password.php">Forgot password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

</div>

{include file='common/footer.tpl'}