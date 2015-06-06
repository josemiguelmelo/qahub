{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    Questions
                </h2>
                <small>{$subtitle}</small>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4>Sponsored questions</h4>
                    </div>
                    <div class="panel-body" style="background: #e5e5e5;">
                        <div class="v-timeline vertical-container animate-panel" data-child="vertical-timeline-block" data-delay="1">
                            {foreach from=$sponsored_questions item=question}
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

                                        </div>
                                    </div>
                                </div>

                            {/foreach}
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
