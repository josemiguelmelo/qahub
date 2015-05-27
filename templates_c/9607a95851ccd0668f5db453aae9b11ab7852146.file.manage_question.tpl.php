<?php /* Smarty version Smarty-3.1.15, created on 2015-05-20 13:52:55
         compiled from "/opt/lbaw/lbaw1461/public_html/tiago/templates/questions/manage_question.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1615926945555c75973ae6c3-59732564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9607a95851ccd0668f5db453aae9b11ab7852146' => 
    array (
      0 => '/opt/lbaw/lbaw1461/public_html/tiago/templates/questions/manage_question.tpl',
      1 => 1431512673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1615926945555c75973ae6c3-59732564',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_555c759745d0d6_23650125',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555c759745d0d6_23650125')) {function content_555c759745d0d6_23650125($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/navigation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    Ask a Question
                </h2>
                <small>Be sure to search before you ask.</small>
            </div>
        </div>
    </div>

    <div class="content">
        <form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/questions/create.php" id="createQuestionForm" method="post">
            <div class="row">
                <div class="col-lg-12 animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                    <div class="hpanel">
                        <div class="panel-heading">
                            Question Information
                        </div>

                        <div class="panel-body form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="tags" name="tags"  placeholder="Tags">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                    <div class="hpanel">
                        <div class="panel-heading">
                            Question
                        </div>
                        <div class="panel-body">
                            <textarea class="form-control" rows="3" name="question" ></textarea>
                            <br />
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
