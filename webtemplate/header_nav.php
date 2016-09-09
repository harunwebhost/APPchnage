<nav class="navbar navbar-dark bg-primary" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">APP Karnataka</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right font-white">
           <li><a href="">Welcome : <?php echo $_SESSION['login_email'] ?></a>  </li>
           <li><a href="">Time : <?php echo current_data_time(); ?></a>  </li>
                <li class="dropdown">
                 <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="../comman/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

                <!-- /.dropdown -->

            </ul>

            <!-- /.navbar-top-links -->
        <?php if($_SESSION['login_userntype']=="master"){
               require_once('master_menus.php'); 
            }
            if($_SESSION['login_userntype']=="distric_user"){
                require_once('distric_menus.php'); 

            }
        ?>

</nav>



