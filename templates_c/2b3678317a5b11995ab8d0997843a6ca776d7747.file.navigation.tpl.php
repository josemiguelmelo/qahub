<?php /* Smarty version Smarty-3.1.15, created on 2015-05-26 15:46:44
         compiled from "/opt/lbaw/lbaw1461/public_html/rui/templates/common/navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:727774916556473df9d5b04-68613440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b3678317a5b11995ab8d0997843a6ca776d7747' => 
    array (
      0 => '/opt/lbaw/lbaw1461/public_html/rui/templates/common/navigation.tpl',
      1 => 1432647999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '727774916556473df9d5b04-68613440',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_556473dfa29f51_98305234',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556473dfa29f51_98305234')) {function content_556473dfa29f51_98305234($_smarty_tpl) {?><div id="header">
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">
        <div id="logo" class="light-version">
            <span>
                QAHub
            </span>
        </div>
    </a>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">QAhub</span>
        </div>
        <form role="search" class="navbar-form-custom" method="GET" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/questions/search.php">
            <div class="form-group">
                <input type="text" placeholder="Search something special" class="form-control" name="search">
            </div>
        </form>
    </nav>
</div>


<!-- Navigation -->
<aside id="menu">
    <div id="navigation">

        <?php if (isset($_SESSION['user'])) {?>
            <div class="profile-picture">
                <a href="#profile">
                    <img src="<?php echo $_SESSION['user']['avatar'];?>
" class="avatar img-circle m-b" alt="logo">

                    <div class="stats-label text-color">
                        <span class="font-extra-bold font-uppercase"><?php echo $_SESSION['user']['name'];?>
</span>
                    </div>
                </a>
            </div>
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/questions/create_question.php"> <span class="nav-label">Ask a Question</span></a>
                </li>
                <li>
                    <a href="#"> <span class="nav-label">Your Questions</span></a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php"> <span class="nav-label">Logout</span></a>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/login.php"> <span class="nav-label">Login</span></a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php"> <span class="nav-label">Register</span></a>
                </li>
            </ul>
        <?php }?>
    </div>
</aside>
<?php }} ?>