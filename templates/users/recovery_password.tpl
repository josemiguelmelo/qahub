{include file='common/header.tpl'}

<div class="register-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>Recover your password</h3>
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
                    <form role="form" action="{$BASE_URL}actions/users/recovery_password.php" method="POST">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Email Address</label>
                                <input type="email" id="" class="form-control" name="email">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Recover</button>
                                <a href="{$BASE_URL}" class="btn btn-danger">Cancel</a>
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
