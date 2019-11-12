<?php

    

     $select = new select();
    
    $Admin_name = $_SESSION['admin'][1];
    // $checkMembers = $checkMember->checkIfMemberIsReg($member_id);

?>


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin Dash!</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?=$Admin_name?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a  href="index.php"><i class="fa fa-home"></i> Home </a>
                </li>
                <li><a href="membership_form.php"><i class="fa fa-edit"></i> Register User</a>
                </li>

                 <li><a href="registeredUsers.php"><i class="fa fa-users"></i> Registered Users</a>
                </li>
               <!--  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="calender.html">Calender</a>
                    </li> -->
                   <!-- <li><a href="general_elements.html">General Elements</a>
                    </li>
                    <li><a href="media_gallery.html">Media Gallery</a>
                    </li>
                    <li><a href="typography.html">Typography</a>
                    </li>
                    <li><a href="icons.html">Icons</a>
                    </li>
                    <li><a href="glyphicons.html">Glyphicons</a>
                    </li>
                    <li><a href="widgets.html">Widgets</a>
                    </li>
                    <li><a href="invoice.html">Invoice</a>
                    </li>
                    <li><a href="inbox.html">Inbox</a>
                    </li>-->
                  <!-- </ul> -->
                </li>
                <li><a><i class="fa fa-table"></i>Pending Requests <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="loan_request.php">Loan Request</a>
                    <!-- <li><a href="mandate_request.php">Mandate Request</a>
                    <li><a href="thrift_request.php">Thrift Request</a> -->
                    </li>
                    <li><a href="mandate_request.php">Mandate Request</a></li>
                  </ul>
                </li>
                <li><a href="messages.php"><i class="fa fa-envelope"></i> Messages</a>
               <!--  <li><a href="profile.html"><i class="fa fa-user"></i> My Profile --> <!--<span class="fa fa-chevron-down"></span>--><!-- </a> -->
                  <!--<ul class="nav child_menu" style="display: none">
                    <li><a href="chartjs.html">Chart JS</a>
                    </li>
                    <li><a href="chartjs2.html">Chart JS2</a>
                    </li>
                    <li><a href="morisjs.html">Moris JS</a>
                    </li>
                    <li><a href="echarts.html">ECharts </a>
                    </li>
                    <li><a href="other_charts.html">Other Charts </a>
                    </li>
                  </ul>
                </li>-->
                <!-- <li><a href="review.html"><i class="fa fa-bug"></i>Review Account</span></a> -->
                  <li><a href="credit.php"><i class="fa fa-money"></i>Credit Account</span></a>
                  <!-- <li><a href="#"><i class="fa fa-bug"></i>Delete User</span></a> -->
                <li><a href="message.html"><i class="glyphicon glyphicon-off"></i> Log out</a>
              </ul>
            </div>
           <!-- <div class="menu_section">
              <ul class="nav side-menu">
                
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="e_commerce.html">E-commerce</a>
                    </li>
                    <li><a href="projects.html">Projects</a>
                    </li>
                    <li><a href="project_detail.html">Project Detail</a>
                    </li>
                    <li><a href="contacts.html">Contacts</a>
                    </li>
                    <li><a href="profile.html">Profile</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="page_404.html">404 Error</a>
                    </li>
                    <li><a href="page_500.html">500 Error</a>
                    </li>
                    <li><a href="plain_page.html">Plain Page</a>
                    </li>
                    <li><a href="login.html">Login Page</a>
                    </li>
                    <li><a href="pricing_tables.html">Pricing Tables</a>
                    </li>

                  </ul>
                </li>
                <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
                </li>
              </ul>
            </div>-->

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
         <!-- <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>-->
          <!-- /menu footer buttons -->
        </div>
      </div>


   