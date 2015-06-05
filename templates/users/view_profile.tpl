{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <h2 class="font-light m-b-xs">
                Profile
            </h2>
            <small>User profile</small>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-12 animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
            <div class="hpanel">
                <div class="panel-heading">
                    Profile information
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{$user.avatar}" class="img-circle profile-picture" alt="logo">
                                </div>
                                <div class="col-md-7    ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="text-warning profile-title">Name </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=col-md-6><span>{$user.name}</span></div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="text-warning profile-title">Email </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=col-md-6><span>{$user.email}</span></div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="text-warning profile-title">Questions </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=col-md-6><span>{count($user.questions)}</span></div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="text-warning profile-title">Badges </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=col-md-6>

                                            <div class="table-responsive">
                                                <table class="table table-striped">

                                                    <tbody>

                                                    {foreach from=$user.badges item=badge}
                                                        <tr>
                                                            <td>
                                                                <span class="text-success font-bold">{$badge.name}</span>
                                                            </td>
                                                        </tr>
                                                    {/foreach}

                                                    </tbody>
                                                </table>
                                            </div>



                                        </div>
                                    </div>
                                </div>

                                {if isset($smarty.session.user)}
                                    <div class="col-md-2">
                                        <button id="followUser" data-id="{$user.id}" {if $user.followed == false} data-value="true" {else} data-value="false" {/if} class="btn btn-warning">
                                            {if $user.followed == false}
                                            Follow user
                                            {else}
                                            Unfollow user
                                            {/if}
                                        </button>
                                    </div>
                                {/if}


                            </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>

{include file='common/footer.tpl'}