<?php /* Smarty version Smarty-3.1.15, created on 2015-05-26 15:49:21
         compiled from "/opt/lbaw/lbaw1461/public_html/rui/templates/users/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24195428755647421845149-32137390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80aef3086688467838564c368aca22121ce3f86f' => 
    array (
      0 => '/opt/lbaw/lbaw1461/public_html/rui/templates/users/login.tpl',
      1 => 1432648114,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24195428755647421845149-32137390',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_556474218ec2d6_87913729',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556474218ec2d6_87913729')) {function content_556474218ec2d6_87913729($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>PLEASE LOGIN TO ASK A QUESTION</h3>
                <small>This is the best place to have doubts!</small>
            </div>
            <div class="hpanel login-box">
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
