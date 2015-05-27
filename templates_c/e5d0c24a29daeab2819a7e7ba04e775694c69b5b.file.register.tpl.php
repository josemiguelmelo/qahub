<?php /* Smarty version Smarty-3.1.15, created on 2015-05-20 12:26:12
         compiled from "/opt/lbaw/lbaw1461/public_html/tiago/templates/users/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1832429920555c61446da136-29218682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5d0c24a29daeab2819a7e7ba04e775694c69b5b' => 
    array (
      0 => '/opt/lbaw/lbaw1461/public_html/tiago/templates/users/register.tpl',
      1 => 1430224545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1832429920555c61446da136-29218682',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_555c614477dde9_80017200',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555c614477dde9_80017200')) {function content_555c614477dde9_80017200($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="register-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>Registration</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    <form role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" method="POST">
                    <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Name</label>
                                <input type="" value="" id="usernameRegister" class="form-control" name="username">
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
                                <input type="email" value="" id="" class="form-control" name="email">
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
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
