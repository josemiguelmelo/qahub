<?php /* Smarty version Smarty-3.1.15, created on 2015-04-28 18:17:34
         compiled from "/opt/lbaw/lbaw1461/public_html/qahub/templates/users/view_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1489587310553fb29e5c2ab7-49617170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb66945d3407831a39a94b0b7a3179872dd1267b' => 
    array (
      0 => '/opt/lbaw/lbaw1461/public_html/qahub/templates/users/view_profile.tpl',
      1 => 1430225338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1489587310553fb29e5c2ab7-49617170',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_553fb29e66fa41_27260511',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553fb29e66fa41_27260511')) {function content_553fb29e66fa41_27260511($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Header -->
<div id="header">
    <a href="index.html">
        <div id="logo" class="light-version">
            <span>
                QAHub
            </span>
        </div>
    </a>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">QAHub</span>
        </div>

    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">

        <div class="profile-picture">
            <a href="#profile">
                <img src="images/profile.jpg" class="img-circle m-b" alt="logo">

                <div class="stats-label text-color">
                    <span class="font-extra-bold font-uppercase">Tiago Ferreira</span>
                </div>
            </a>
        </div>

        <ul class="nav" id="side-menu">
            <li class="active">
                <a href="#"> <span class="nav-label">Ask a Question</span></a>
            </li>
            <li>
                <a href="#"> <span class="nav-label">Your Questions</span></a>
            </li>
            <li>
                <a href="#"> <span class="nav-label">Logout</span></a>
            </li>
        </ul>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    Edit your profile
                </h2>
                <small>You can edit your private information.</small>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-lg-12 animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                <div class="hpanel">
                    <div class="panel-heading">
                        Profile information
                    </div>

                    <div class="hpanel">
                        <div class="panel-body">
                            <form action="register.html#" id="loginForm">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Name</label>
                                        <input type="" value="" id="" class="form-control" name=""
                                               placeholder="Tiago Ferreira">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Password</label>
                                        <input type="password" value="" id="" class="form-control" name=""
                                               placeholder="Fill only if you want to change your password">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Repeat Password</label>
                                        <input type="password" value="" id="" class="form-control" name=""
                                               placeholder="Make sure to match the password field">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Email Address</label>
                                        <input type="" value="" id="" class="form-control" name=""
                                               placeholder="tiagommferreira@gmail.com">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Repeat Email Address</label>
                                        <input type="" value="" id="" class="form-control" name=""
                                               placeholder="tiagommferreira@gmail.com">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Upload a different photo</label>
                                        <input type="file" value="" id="" class="form-control" photo="">
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-success submit-changes">Submit Changes</button>
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
