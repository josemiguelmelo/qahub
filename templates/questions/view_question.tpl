{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader animated bounce">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    {$question.question.title}
                </h2>
            </div>
        </div>
    </div>


    <div class="content animated zoomIn">
        <div class="row social-board">
            <div class="col-lg-1 col-xs-2 vote-thumbs">
                <span class="fa fa-thumbs-o-up" data-id="{$question.question.contentid}" data-value="1"></span>
                <p>{$question.questionVotes}</p>
                <span class="fa fa-thumbs-o-down" data-id="{$question.question.contentid}" data-value="-1"></span>

            </div>
            <div class="col-lg-11 col-xs-10">
                <div class="hpanel hblue">
                    <div class="panel-body">
                        <div class="media social-profile clearfix">
                            <a class="pull-left">
                                <img src="{$question.question.avatar}" alt="profile-picture">
                            </a>

                            <div class="media-body">
                                <h5>{$question.question.name}</h5>
                                <small class="text-muted">{date('j.m.Y', strtotime($question.question.created_when))} </small>
                            </div>
                        </div>

                        <div class="social-content m-t-md">
                            {$question.question.content}
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="social-form">
                            <form action="{$BASE_URL}actions/comments/add_comment.php" id="addCommentForm" method="post">
                               
                                {foreach from=$question.question.comments item=comment}
                                
                                <div class="social-talk">
                                    <div class="media social-profile clearfix">
                                        <a class="pull-left">
                                            <img src="{$comment.avatar}" alt="profile-picture">
                                        </a>

                                        <div class="media-body">
                                            <span class="font-bold">{$comment.name}</span>
                                            <small class="text-muted">{$comment.created_when}</small>

                                            <div class="social-content">
                                                {$comment.content}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                {/foreach}
                                
                                
                                <input hidden="true" name="questionId" value="{$question.question.questionid}"/>
                                <input name="commentContent" class="form-control comment" placeholder="Your comment">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ol class="breadcrumb">
            <li>Answers</li>
        </ol>

        {foreach from=$question.answers item=answer}
            <div class="row social-board">
                <div class="col-lg-1 col-xs-2 vote-thumbs">
                    <span class="fa fa-thumbs-o-up" data-id="{$answer.contentid}" data-value="1"></span>
                    <p>{$answer.classification}</p>
                    <span class="fa fa-thumbs-o-down" data-id="{$answer.contentid}" data-value="-1"></span>
                </div>
                <div class="col-lg-11 col-xs-10">
                    <div class="hpanel hblue">
                        <div class="panel-body">
                            <div class="media social-profile clearfix">
                                <a class="pull-left">
                                    <img src="{$question.question.avatar}" alt="profile-picture">
                                </a>

                                <div class="media-body">
                                    <h5>{$answer.name}</h5>
                                    <small class="text-muted">{date('j.m.Y', strtotime($answer.created_when))} </small>
                                </div>
                            </div>

                            <div class="social-content m-t-md">
                                {$answer.content}
                            </div>

                        </div>
                        <div class="panel-footer">
                            <div class="social-form">
                                <form action="{$BASE_URL}actions/comments/add_comment.php" id="addCommentForm" method="post">
                                    {foreach from=$answer.comments item=comment}
                                
                                        <div class="social-talk">
                                            <div class="media social-profile clearfix">
                                                <a class="pull-left">
                                                    <img src="{$comment.avatar}" alt="profile-picture">
                                                </a>
        
                                                <div class="media-body">
                                                    <span class="font-bold">{$comment.name}</span>
                                                    <small class="text-muted">{$comment.created_when}</small>
        
                                                    <div class="social-content">
                                                        {$comment.content}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    {/foreach}
                                    
                                    
                                    <input hidden="true" name="answerId" value="{$answer.contentid}"/>
                                    <input name="commentContent" class="form-control comment" placeholder="Your comment">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {/foreach}

        {if $question.question.closed === false}
            <div class="row">
                <div class="col-lg-12 animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                    <div class="hpanel">
                        <div class="panel-heading">
                            Your Answer
                        </div>
                        <div class="panel-body">
                            <form action="{$BASE_URL}actions/questions/add_answer.php" id="addAnswerForm" method="post">
                                <input hidden="true" name="questionId" value="{$question.question.questionid}"/>
                                <textarea name="answerContent" class="form-control" rows="3"></textarea>
                                <br/>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        {/if}


    </div>

{include file='common/footer.tpl'}

