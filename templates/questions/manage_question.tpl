{include file='common/header.tpl'}


<!-- Header -->
<div id="header">
    <a href="index.html">
        <div id="logo" class="light-version">
            <span>
                QAHub
            </span>
        </div>
    </a>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">QAHub</span>
        </div>

    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">

        <div class="profile-picture">
            <a href="#profile">
                <img src="images/profile.jpg" class="img-circle m-b" alt="logo">

                <div class="stats-label text-color">
                    <span class="font-extra-bold font-uppercase">Tiago Ferreira</span>
                </div>
            </a>
        </div>

        <ul class="nav" id="side-menu">
            <li class="active">
                <a href="#"> <span class="nav-label">Ask a Question</span></a>
            </li>
            <li>
                <a href="#"> <span class="nav-label">Your Questions</span></a>
            </li>
            <li>
                <a href="#"> <span class="nav-label">Logout</span></a>
            </li>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">

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
        <div class="row">
            <div class="col-lg-12 animated-panel zoomIn" style="-webkit-animation-delay: 0.2s;">
                <div class="hpanel">
                    <div class="panel-heading">
                        Question Information
                    </div>
                    <div class="panel-body form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tags" placeholder="Tags">
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
                        <textarea class="form-control" rows="3"></textarea>
                        <br />
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

{include file='common/header.tpl'}