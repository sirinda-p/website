<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="../images/logo-m.png" alt="" style="height: 40px;margin-top: -10px;float: left;margin-right: 15px;"> Admin Panel</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown" style="float:right;">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                  <li>
                    <a>
                      <i class="fa fa-user fa-fw"></i>
                      Hello, <?php echo $_SESSION['username']; ?>
                    </a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="?page=logout">
                      <i class="fa fa-sign-out fa-fw"></i>
                      Logout
                    </a>
                  </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="?page=news"><i class="fa fa-dashboard fa-fw"></i> News</a>
                    </li>
                    <li>
                        <a href="?page=courses"><i class="fa fa-book fa-fw"></i> Courses</a>
                    </li>
                    <li>
                        <a href="?page=instructors"><i class="fa fa-users fa-fw"></i> Instructors</a>
                    </li>
										<li>
                        <a href="../" target="_blank"><i class="fa fa-desktop fa-fw"></i> View Site</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
    <div id="page-wrapper">
