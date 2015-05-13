<?php /* Smarty version Smarty-3.1.15, created on 2015-05-13 12:39:15
         compiled from "/opt/lbaw/lbaw1461/public_html/qahub/templates/questions/view_questions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:238993474553f65f959abd7-89449927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b6283aa9928a905afd8cacd36287be70845db15' => 
    array (
      0 => '/opt/lbaw/lbaw1461/public_html/qahub/templates/questions/view_questions.tpl',
      1 => 1431513553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238993474553f65f959abd7-89449927',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_553f65f963cd56_51322722',
  'variables' => 
  array (
    'all_questions' => 0,
    'question' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553f65f963cd56_51322722')) {function content_553f65f963cd56_51322722($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navigation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    Questions
                </h2>
                <small>The most popular questions right now.</small>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="hpanel">
                    <div class="v-timeline vertical-container animate-panel" data-child="vertical-timeline-block" data-delay="1">
                        <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>
                            <div class="vertical-timeline-block animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <div class="p-sm">
                                        <span class="vertical-date pull-right"> <?php echo date('l',strtotime($_smarty_tpl->tpl_vars['question']->value['created_when']));?>
 <br> <small><?php echo date('g:i A',strtotime($_smarty_tpl->tpl_vars['question']->value['created_when']));?>
</small> </span>

                                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/questions/view_question.php?id=<?php echo $_smarty_tpl->tpl_vars['question']->value['id'];?>
"><h2><?php echo $_smarty_tpl->tpl_vars['question']->value['title'];?>
</h2></a>
                                        <p>
                                            <?php echo $_smarty_tpl->tpl_vars['question']->value['content'];?>

                                        </p>
                                    </div>
                                    <div class="panel-footer">

                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
