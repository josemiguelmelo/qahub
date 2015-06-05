{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <h2 class="font-light m-b-xs">
                Edit your profile
            </h2>
            <small>You can edit your private information.</small>
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
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="text-warning profile-title">Name: </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=col-md-6><span>{$user.name}</span></div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="text-warning profile-title">Email: </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=col-md-6><span>{$user.email}</span></div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="text-warning profile-title">Questions: </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=col-md-6><span>{count($user.questions)}</span></div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="text-warning profile-title">Badges: </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=col-md-6><span>Complete badges </span></div>
                                    </div>
                                </div>

                                {if isset($smarty.session.user)}
                                    <div class="col-md-2">
                                        <button class="btn btn-warning">Follow user</button>
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