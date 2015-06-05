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
                            <form action="{$BASE_URL}actions/users/perfil_edit.php" method="POST" id="profileForm" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Name</label>
                                        <input type="" value="{$smarty.session.user.name}" id="" class="form-control" name="name"
                                               >
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Password</label>
                                        <input type="password" value="" id="" class="form-control" name="password"
                                               placeholder="Fill only if you want to change your password">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Repeat Password</label>
                                        <input type="password" value="" id="" class="form-control" name="password_confirmation"
                                               placeholder="Make sure to match the password field">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Email Address</label>
                                        <input type="" value="{$smarty.session.user.email}" id="" class="form-control" name="email"
                                              >
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Repeat Email Address</label>
                                        <input type="" value="{$smarty.session.user.email}" id="" class="form-control" name="email_confirmation"
                                               >
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Upload a different photo</label>
                                        <input type="file" class="form-control" name="avatar">
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-success submit-changes">Submit Changes</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file='common/footer.tpl'}