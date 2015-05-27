{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

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
        <form action="{$BASE_URL}actions/questions/create.php" id="createQuestionForm" method="post">
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

{include file='common/footer.tpl'}