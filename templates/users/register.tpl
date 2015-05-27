{include file='common/header.tpl'}

<div class="register-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>Registration</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body login-box">
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
                    <form role="form" action="{$BASE_URL}actions/users/register.php" method="POST">
                    <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Name</label>
                                <input type="text" value="{$smarty.session.oldinput.username}" id="usernameRegister" class="form-control" name="username">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" value="" id="" class="form-control" name="password">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Repeat Password</label>
                                <input type="password" value="" id="" class="form-control" name="password_confirmation">
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Email Address</label>
                                <input type="email" value="{$smarty.session.oldinput.email}" id="" class="form-control" name="email">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success">Register</button>
                                <button class="btn btn-default">Cancel</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

</div>
{include file='common/footer.tpl'}
