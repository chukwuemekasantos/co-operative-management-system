<?php

    

    $checkMember = new select();

     $member_id = $_SESSION['members'][0];

     $userInfo = $checkMember->userInfo($member_id);


   // print_r($userInfo);
     // foreach ($userInfo as $value) {
     
     // }
    
    $checkMembers = $checkMember->checkIfMemberIsReg($member_id);

    

?>


    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>My Dashboard!</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="<?='./member_passport/'.$userInfo[0]['member_passport']?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?=$userInfo[0]['member_name']?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Member</h3>
              <ul class="nav side-menu">
                 <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                  <!-- <li><a href="view_account.html"><i class="fa fa-bar-chart-o"></i> View Account</a>
                </li> -->
                <li><a><i class="fa fa-edit"></i>Application Forms <span class="fa fa-chevron-down"></span></a>

                  <ul class="nav child_menu" style="display: none">
                    <?php
                      if ($checkMembers == 'user_registered'):         
                    ?>
                      <li><a href="mandate_form.php">Mandate Form</a>
                    </li>
                     <li id="thrift_form"><a href="thrift_form.php">Thrift Form</a>
                    </li>
                     <li><a href="loan_form.php">Loan Form</a>
                    </li>
                    <?php
                      else:
                    ?>
                     <li><a href="membership_form.php">Membership Form</a></li>
                    <?php
                      endif;
                    ?>
                     
                  </ul>
                </li>

                <li><a><i class="fa fa-check"></i> Approved Requests <span class="fa fa-chevron-down"></span></a>

                  <ul class="nav child_menu" style="display: none">
                   
                    
                    
                     <li><a href="loan_approved.php">Loan List</a>
                    </li>
                     <li ><a href="mandate_approved.php">Mandate List</a>
                    </li>
                  </ul>
                </li>
               <li><a href="report.php"><i class="fa fa-book" ></i> Generate Report <span class=""></span></a>
                </li> 
             <!--  <li><a href="generate_report.html"><i class="fa fa-caret-square-o-right"></i>Generate Report</a> </li> -->
               <li><a href="inbox.php"><i class="fa fa-comments-o"></i>Message Admin</a> </li>
               <!--  <li><a href="profile.php"><i class="glyphicon glyphicon-user">&nbsp  </i>My Profile</a> </li> -->
               <li><a href=#><i class="glyphicon glyphicon-comment">&nbsp  </i>Forum</a> </li>
               <li><a href="log_out.php"><i class="glyphicon glyphicon-off">&nbsp  </i>Log Out</a> </li>  
                
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

   