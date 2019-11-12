<?php

     $select = new select();
    
    
      $Admin_name = $_SESSION['admin'][1];

     $count = $select->countNewMessage();

     $newMessage = $select->SelectNewMessagesForAdmin();

     
        # code...
    
?>
<div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt=""><?=$Admin_name?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                 <!--  <li><a href="javascript:;">  Profile</a>
                  </li> -->
                 
                  <li><a href="log_out.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green"><?=$count?></span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <?php

                         foreach ($newMessage as $value) {
                  ?>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span><?=$value['member_name']?></span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                          <?=$value['member_message']?>       
                      </span>
                    </a>
                  </li>
                <?php

                    }

                ?> 
                 
                  <li>
                    <div class="text-center">
                      <a href="messages.php">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>