{include file='common/header.tpl'}
{include file='common/navigation.tpl'}

<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <h2 class="font-light m-b-xs">
                Your Favourite Users
            </h2>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="hpanel">
                <div class="v-timeline vertical-container animate-panel" data-child="vertical-timeline-block" data-delay="1">
                        {foreach from=$favourite_users item=favourite}
                        <div class="vertical-timeline-block animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                            <div class="vertical-timeline-icon navy-bg">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="vertical-timeline-content">
                                <div class="p-sm">

                                    <a href="{$BASE_URL}pages/users/view_profile.php?id={$favourite.id}"><h2>{$favourite.name}</h2></a>
                                    <p>
                                        {$favourite.email}
                                    </p>
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
                                    <h3 class="no-questions">You have no favourites yet.</h3>
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
