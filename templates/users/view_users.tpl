{include file='common/header.tpl'}
{include file='common/navigation.tpl'}


<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    All users
                </h2>
                <small>Here you can manage all users.</small>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                        {foreach from=$all_users item=user}
                            <div class="col-lg-12 col-xs-10">
                                <div class="hpanel hblue">
                                    <div class="panel-body">
                                        <div class="media social-profile clearfix">
                                            <a class="pull-left">
                                                <img src="{$user.avatar}" class="avatar img-circle m-b" alt="logo">
                                            </a>

                                            <div class="media-body">
                                                <h5>{$user.name} - {$user.email}</h5>
                                                <small class="text-muted">{date('j.m.Y', strtotime($user.created_when))} </small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col col-lg-2">
                                                <form action="{$BASE_URL}actions/users/delete.php" id="userDelete" method="post">
                                                    <input type="hidden" value={$user.id} name="id" id="id">
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

{include file='common/footer.tpl'}