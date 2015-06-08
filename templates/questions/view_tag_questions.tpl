{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <h2 class="font-light m-b-xs">
                Questions with "{$tag_string}" tag
            </h2>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="hpanel">
                <div class="v-timeline vertical-container animate-panel" data-child="vertical-timeline-block" data-delay="1">
                    {foreach from=$tag_questions->data item=question}
                        <div class="vertical-timeline-block animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="p-sm">
                                    <span class="vertical-date pull-right"> {date('l', strtotime($question.created_when))} <br> <small>{date('g:i A', strtotime($question.created_when))}</small> </span>

                                    <a href="{$BASE_URL}pages/questions/view_question.php?id={$question.questionid}"><h2>{$question.title}</h2></a>
                                    <p>
                                        {$question.content}
                                    </p>
                                </div>
                                <div class="panel-footer">
                                    {if $question.closed === false}
                                        <a class="btn btn-danger btn-sm" href="{$BASE_URL}actions/questions/close.php?id={$question.id}">Close</a>
                                    {/if}
                                </div>
                            </div>
                        </div>
                    {/foreach}
                    <div class="row">
                        <div class="col-md-2 col-md-offset-5">
                            {$pagination_links}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{include file='common/footer.tpl'}
