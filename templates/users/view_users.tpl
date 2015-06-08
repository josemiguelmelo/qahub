{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

    <div class="normalheader transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    All users
                </h2>
                <form role="search" class="navbar-form-custom" method="POST" action="{$BASE_URL}actions/users/search.php">
                    <div class="form-group">
                        <input type="text" placeholder="Search specific User" class="form-control" name="search">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                        {foreach from=$all_users->data item=user}
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
                                                {if $user.role == 1}
                                                    <form action="{$BASE_URL}actions/users/setAdmin.php" id="userAdmin" method="post">
                                                        <input type="hidden" value={$user.id} name="id" id="id">
                                                        <button class="btn-sm btn btn-success btn-block">Set as admin</button>
                                                    </form>
                                                {/if}


                                            </div>
                                        </div>

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

{include file='common/footer.tpl'}