{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

    <div class="normalheader animated bounce">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">

                    <div class="row">
                        <div class="col-md-11">
                            {$question.question.title}
                        </div>
                        <div class="col-md-1">
                            <i id="setFavouriteQuestion" data-id="{$question.question.questionid}" {if count($favourite) == 0} class="fa fa-star-o" data-value="0" {else} class="fa fa-star" data-value="1" {/if}></i>
                        </div>
                    </div>
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
                                <h5><a href="{$BASE_URL}pages/users/view_profile.php?id={$question.question.id}">{$question.question.name}</a> </h5>
                                <small class="text-muted">{date('j.m.Y', strtotime($question.question.created_when))} </small>
                                </br>
                                {foreach from=$question.tags_array item=tag}
                                    <span class="tag label label-info questionTag">{$tag}</span>
                                {/foreach}

                            </div>
                        </div>
                        <div id="question-content" class="social-content m-t-md">
                            {nl2br($question.question.content)}
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
                                            <span class="font-bold"><a href="{$BASE_URL}pages/users/view_profile.php?id={$comment.id}">{$comment.name}</a></span>
                                            <small class="text-muted">{$comment.created_when}</small>

                                            <div class="comment">
                                                {$comment.content}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                {/foreach}

                                {if isset($smarty.session.user) }
                                <input hidden="true" name="questionId" value="{$question.question.questionid}"/>
                                <input name="commentContent" class="form-control comment" placeholder="Your comment">
                                {/if}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="youtube-player" style="display: none;">
            <h3>Attachments</h3>
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
                                    <img src="{$answer.avatar}" alt="profile-picture">
                                </a>

                                <div class="media-body">
                                    <h5><a href="{$BASE_URL}pages/users/view_profile.php?id={$answer.id}">{$answer.name}</a></h5>
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
                                                    <span class="font-bold"><a href="{$BASE_URL}pages/users/view_profile.php?id={$comment.id}">{$comment.name}</a></span>
                                                    <small class="text-muted">{$comment.created_when}</small>
        
                                                    <div class="comment">
                                                        {$comment.content}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    {/foreach}

                                    {if isset($smarty.session.user) }
                                        <input hidden="true" name="questionId" value="{$question.question.questionid}"/>
                                        <input hidden="true" name="answerId" value="{$answer.contentid}"/>
                                        <input name="commentContent" class="form-control comment" placeholder="Your comment">
                                    {/if}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {/foreach}

        {if $question.question.closed === false && isset($smarty.session.user) }
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

