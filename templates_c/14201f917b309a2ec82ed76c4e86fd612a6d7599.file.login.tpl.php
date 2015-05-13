<?php /* Smarty version Smarty-3.1.15, created on 2015-04-28 14:24:02
         compiled from "/opt/lbaw/lbaw1461/public_html/qahub/templates/users/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1762813787553f7ab91facb9-74666474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14201f917b309a2ec82ed76c4e86fd612a6d7599' => 
    array (
      0 => '/opt/lbaw/lbaw1461/public_html/qahub/templates/users/login.tpl',
      1 => 1430223840,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1762813787553f7ab91facb9-74666474',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_553f7ab928e788_60704750',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553f7ab928e788_60704750')) {function content_553f7ab928e788_60704750($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>PLEASE LOGIN TO ASK A QUESTION</h3>
                <small>This is the best place to have doubts!</small>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" id="loginForm" method="post">
                        <div class="form-group">
                            <label class="control-label" for="email">E-mail</label>
                            <input type="email" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                        </div>
                        <button class="btn btn-success btn-block">Login</button>
                        <a class="btn btn-default btn-block" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
