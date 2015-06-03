{include file='common/header.tpl'}

{include file='common/navigation.tpl'}


<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <h2 class="font-light m-b-xs">
                Edit question
            </h2>
        </div>
    </div>
</div>

<div class="content">
    <form action="{$BASE_URL}actions/questions/edit.php" id="editQuestionForm" method="post">
        <div class="row">
            <div class="col-lg-12 animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                <div class="hpanel">
                    <div class="panel-heading">
                        Question Information
                    </div>

                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                       value="{$question.question.title}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tags" name="tags" data-role="tagsinput" placeholder="Tags" value={$question.tags}>
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
                        <input hidden="true" name="questionId" value="{$question.question.questionid}"/>
                        <textarea class="form-control" rows="3" name="question">{$question.question.content}</textarea>
                        <br/>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

{include file='common/footer.tpl'}