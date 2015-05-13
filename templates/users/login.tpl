{include file='common/header.tpl'}

<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>PLEASE LOGIN TO ASK A QUESTION</h3>
                <small>This is the best place to have doubts!</small>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="{$BASE_URL}actions/users/login.php" id="loginForm" method="post">
                        <div class="form-group">
                            <label class="control-label" for="email">E-mail</label>
                            <input type="email" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                        </div>
                        <button class="btn btn-success btn-block">Login</button>
                        <a class="btn btn-default btn-block" href="{$BASE_URL}pages/users/register.php">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

</div>

{include file='common/footer.tpl'}