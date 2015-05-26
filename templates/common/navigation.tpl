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
                <a href="#profile">
                    <img src="{$smarty.session.user.avatar}" class="avatar img-circle m-b" alt="logo">

                    <div class="stats-label text-color">
                        <span class="font-extra-bold font-uppercase">{$smarty.session.user.name}</span>
                    </div>
                </a>
            </div>
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{$BASE_URL}pages/questions/create_question.php"> <span class="nav-label">Ask a Question</span></a>
                </li>
                <li>
                    <a href="#"> <span class="nav-label">Your Questions</span></a>
                </li>
                <li>
                    <a href="{$BASE_URL}actions/users/logout.php"> <span class="nav-label">Logout</span></a>
                </li>
            </ul>
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
