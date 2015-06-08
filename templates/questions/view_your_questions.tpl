{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    Your Questions
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="hpanel">
                    <div class="v-timeline vertical-container animate-panel" data-child="vertical-timeline-block" data-delay="1">
                        {foreach from=$all_user_questions item=question}
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
                                        {if $question.closed === false}
                                            <a class="btn btn-success btn-sm" href="{$BASE_URL}pages/questions/edit_question.php?id={$question.id}">Edit</a>

                                            {if $question.priority ==1 }
                                                <button id={$question.id} data-toggle="modal" data-target="#promoteModal" onclick="setQuestionIdToPromote({$question.id})" class="btn btn-warning btn-sm">Promote</button>
                                            {/if}
                                            <a class="btn btn-danger btn-sm" href="{$BASE_URL}actions/questions/close.php?id={$question.id}">Close</a>
                                        {else}
                                            Question closed.
                                        {/if}
                                    </div>
                                </div>
                            </div>

                        {foreachelse}
                            <div class="vertical-timeline-block animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <div class="p-sm">
                                        <h3 class="no-questions">You have no questions yet.</h3>
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



<!-- Donate Modal -->
<div class="modal fade" id="promoteModal" tabindex="-1" role="dialog" aria-labelledby="promoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <span style="font-size: 1.2em;">Are you sure you want to promote your question?</span><br><br>
                        <span style="font-weight: bold; color:#67b168; font-size: 1.2em;">Cost: </span> <span style="font-size: 1.2em;">1$</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button id="promoteQuestion" type="button" class="btn btn-success">Promote</button>
            </div>
        </div>
    </div>
</div>



<script>
    function setQuestionIdToPromote(buttonId) {
        var d = document.getElementById("promoteQuestion");  //   Javascript
        d.setAttribute('data-id' , buttonId);
    }
</script>

{include file='common/footer.tpl'}
