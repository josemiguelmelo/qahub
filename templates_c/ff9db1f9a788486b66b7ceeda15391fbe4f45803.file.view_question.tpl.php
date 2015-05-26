<?php /* Smarty version Smarty-3.1.15, created on 2015-05-26 15:43:17
         compiled from "/opt/lbaw/lbaw1461/public_html/rui/templates/questions/view_question.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1284032621556477cf812441-10110326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff9db1f9a788486b66b7ceeda15391fbe4f45803' => 
    array (
      0 => '/opt/lbaw/lbaw1461/public_html/rui/templates/questions/view_question.tpl',
      1 => 1432647793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1284032621556477cf812441-10110326',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_556477cf93e0c9_87745874',
  'variables' => 
  array (
    'question' => 0,
    'answer' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556477cf93e0c9_87745874')) {function content_556477cf93e0c9_87745874($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('common/navigation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader animated bounce">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <?php echo $_smarty_tpl->tpl_vars['question']->value['question']['title'];?>

                </h2>
            </div>
        </div>
    </div>


    <div class="content animated zoomIn">
        <div class="row social-board">
            <div class="col-lg-1 col-xs-2 vote-thumbs">
                <span class="fa fa-thumbs-o-up"></span>
                <p><?php echo $_smarty_tpl->tpl_vars['question']->value['questionVotes'];?>
</p>
                <span class="fa fa-thumbs-o-down"></span>
            </div>
            <div class="col-lg-11 col-xs-10">
                <div class="hpanel hblue">
                    <div class="panel-body">
                        <div class="media social-profile clearfix">
                            <a class="pull-left">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['question']->value['question']['avatar'];?>
" alt="profile-picture">
                            </a>

                            <div class="media-body">
                                <h5><?php echo $_smarty_tpl->tpl_vars['question']->value['question']['name'];?>
</h5>
                                <small class="text-muted"><?php echo date('j.m.Y',strtotime($_smarty_tpl->tpl_vars['question']->value['question']['created_when']));?>
 </small>
                            </div>
                        </div>

                        <div class="social-content m-t-md">
                            <?php echo $_smarty_tpl->tpl_vars['question']->value['question']['content'];?>

                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="social-form">
                            <input class="form-control" placeholder="Your comment">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ol class="breadcrumb">
            <li>Answers</li>
        </ol>

        <?php  $_smarty_tpl->tpl_vars['answer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['answer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['question']->value['answers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['answer']->key => $_smarty_tpl->tpl_vars['answer']->value) {
$_smarty_tpl->tpl_vars['answer']->_loop = true;
?>
            <div class="row social-board">
                <div class="col-lg-1 col-xs-2 vote-thumbs">
                    <span class="fa fa-thumbs-o-up"></span>

                    <p><?php echo $_smarty_tpl->tpl_vars['answer']->value['classification'];?>
</p>
                    <span class="fa fa-thumbs-o-down"></span>
                </div>
                <div class="col-lg-11 col-xs-10">
                    <div class="hpanel hblue">
                        <div class="panel-body">
                            <div class="media social-profile clearfix">
                                <a class="pull-left">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['question']->value['question']['avatar'];?>
" alt="profile-picture">
                                </a>

                                <div class="media-body">
                                    <h5><?php echo $_smarty_tpl->tpl_vars['answer']->value['name'];?>
</h5>
                                    <small class="text-muted"><?php echo date('j.m.Y',strtotime($_smarty_tpl->tpl_vars['answer']->value['created_when']));?>
 </small>
                                </div>
                            </div>

                            <div class="social-content m-t-md">
                                <?php echo $_smarty_tpl->tpl_vars['answer']->value['content'];?>

                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="social-form">
                                <input class="form-control" placeholder="Your comment">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>



        <div class="row">
            <div class="col-lg-12 animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                <div class="hpanel">
                    <div class="panel-heading">
                        Your Answer
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/questions/add_answer.php" id="addAnswerForm" method="post">
                            <input hidden="true" name="questionId" value="<?php echo $_smarty_tpl->tpl_vars['question']->value['question']['questionid'];?>
"/>
                            <textarea name="answerContent" class="form-control" rows="3"></textarea>
                            <br/>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
