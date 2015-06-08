{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    All questions
                </h2>
                <form role="search" class="navbar-form-custom" method="POST" action="{$BASE_URL}actions/questions/search_admin.php">
                    <div class="form-group">
                        <input type="text" placeholder="Search specific Question" class="form-control" name="search">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="hpanel">
                    <div class="v-timeline vertical-container animate-panel" data-child="vertical-timeline-block" data-delay="1">
                        {foreach from=$all_questions item=question}
                            <div class="vertical-timeline-block animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <div class="p-sm">
                                        <span class="vertical-date pull-right"> {date('l', strtotime($question.created_when))} <br> <small>{date('g:i A', strtotime($question.created_when))}</small> </span>

                                        <a href="{$BASE_URL}pages/questions/view_question.php?id={$question.id}"><h2>{$question.title}</h2></a>
                                        <p>
                                            {$question.content}
                                        </p>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col col-lg-2">
                                                <form action="{$BASE_URL}actions/questions/delete.php" id="deleteQuestion" method="post">
                                                    <input type="hidden" value={$question.id} name="id" id="id">
                                                    <button class="btn-sm btn btn-danger btn-block">Delete</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}