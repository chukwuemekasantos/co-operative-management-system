<?php

     $select = new select();

      $insert = new insert();
    
    $member_id = $_SESSION['members'][0];

     $insert->changebadge($member_id);

     $count = $select->countReplyedMessage($member_id);

     $getAdminreply = $select->SelectReplyMessagesForUser($member_id); 

     $userInfo = $select->userInfo($member_id);

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
                  <img src="<?='./member_passport/'.$userInfo[0]['member_passport']?>" alt=""><?=$userInfo[0]['member_name']?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <!-- <li><a href="javascript:;">  Profile</a>
                  </li> -->
                 
                  <li><a href="log_out.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <form method="POST" action="inbox.php">
                <button type="submit" name="changebadge" class=" info-number"  aria-expanded="false" style="margin-top:19px; background-color: white; border: none;">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green" id="badge"><?=$count?></span>
                </button>
              </form>
                               <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <?php

                         foreach ($getAdminreply as $value) {
                  ?>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>Admin</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        <?=$value['admin_reply']?>
                                    </span>
                    </a>
                  </li>
                <?php

                      }

                ?> 
                 
                  <li>
                    <div class="text-center">
                      <a href="inbox.php">
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