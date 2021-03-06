<div id="header">
    <a href="{$BASE_URL}">
        <div id="logo" class="light-version">
            <span>
                QAHub
            </span>
        </div>
    </a>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">QAhub</span>
        </div>
        <form role="search" class="navbar-form-custom" method="GET" action="{$BASE_URL}pages/questions/search.php">
            <div class="form-group">
                <input type="text" placeholder="Search something special" class="form-control" name="search">
            </div>
        </form>

    </nav>
</div>


<!-- Navigation -->
<aside id="menu">
    <div id="navigation">

        {if isset($smarty.session.user) }

            <div class="profile-picture">
                <a href="{$BASE_URL}pages/users/edit_profile.php">
                    <img src="{$smarty.session.user.avatar}" class="avatar img-circle m-b" alt="logo">

                    <div class="stats-label text-color">
                        <span class="font-extra-bold font-uppercase">{$smarty.session.user.name}</span>
                    </div>

                    <div>
                        <span>Balance: ${$smarty.session.user.cash / 100}</span>
                    </div>
                </a>
            </div>
            {if $smarty.session.user.role eq 2} <!-- user is admin -->
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{$BASE_URL}actions/users/switch.php" > <span class="nav-label">Switch to Normal User</span></a>
                    </li>
                    <li>
                        <a href="{$BASE_URL}pages/questions/view_questions.php"> <span class="nav-label">See questions</span></a>
                    </li>
                    <li>
                        <a href="{$BASE_URL}pages/users/view_users.php"> <span class="nav-label">See users</span></a>
                    </li>
                    <li>
                        <a href="{$BASE_URL}pages/users/messages.php"><span class="nav-label">Messages  {if isset($numberOfMessages)} {if $numberOfMessages>0} ({$numberOfMessages}) {/if} {/if}</span></a>
                    </li>
                    <li>
                        <a href="{$BASE_URL}actions/users/export.php"><span class="nav-label">Export Users</span></a>
                    </li>
                    <li>
                        <a href="{$BASE_URL}actions/questions/export.php"><span class="nav-label">Export Questions</span></a>
                    </li>
                    <li>
                        <a href="{$BASE_URL}actions/users/logout.php" > <span class="nav-label">Logout</span></a>
                    </li>
                </ul>

            {else} <!-- if it is a normal user -->
            <ul class="nav" id="side-menu">
                {if $smarty.session.user.admin eq true}
                    <li>
                        <a href="{$BASE_URL}actions/users/switch_admin.php" > <span class="nav-label">Switch to Admin</span></a>
                    </li>
                {/if}
                <li>
                    <a href="{$BASE_URL}pages/questions/create_question.php"> <span class="nav-label">Ask a Question</span></a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/questions/view_your_questions.php"> <span class="nav-label">Your Questions</span></a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/questions/view_your_favourite_questions.php"> <span class="nav-label">Your Favourite Questions</span></a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/users/messages.php"><span class="nav-label">Messages  {if isset($numberOfMessages)} {if $numberOfMessages>0} ({$numberOfMessages}) {/if} {/if}</span></a>
                </li>

                <li>
                    <a href="{$BASE_URL}actions/users/logout.php"> <span class="nav-label">Logout</span></a>
                </li>

            </ul>
            {/if}
        {else}
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{$BASE_URL}pages/users/login.php"> <span class="nav-label">Login</span></a>
                </li>
                <li>
                    <a href="{$BASE_URL}pages/users/register.php"> <span class="nav-label">Register</span></a>
                </li>
            </ul>
        {/if}
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">
    {if isset($ERROR_MESSAGES) || isset($SUCCESS_MESSAGES)}
    <div class="normalheader">
        <div id="error_messages">
            {foreach $ERROR_MESSAGES as $error}
                <div class="alert alert-danger">{$error}</div>
            {/foreach}
        </div>
        <div id="success_messages">
            {foreach $SUCCESS_MESSAGES as $success}
                <div class="alert alert-success">{$success}</div>
            {/foreach}
        </div>
    </div>
{/if}