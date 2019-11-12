<?php
 session_start();

 include_once './include/session_auth.php';

    include_once '../contoller/select.php';

    include_once '../contoller/insert.php';

    $insert = new insert();

    $select = new select();

    $m_id = $_REQUEST['id'];
    
    $replyMessage = $insert->AdminReply($m_id);


    $newMessage = $select->SelectNewMessagesForAdmin();
    
    //$checkMembers = $checkMember->checkIfMemberIsReg($member_id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>FunaiCoop!  </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  
 <div class="container body">

    <?php

      include_once("./include/sidebar.php");

    ?>

      <!-- top navigation -->
    <?php

        include_once("./include/navbar.php");

    ?>

      </div>
      <!-- top navigation -->
     
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>Inbox </h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>My Mail</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <div class="row">

                    <div class="col-sm-3 mail_list_column">

                    <?php

                          foreach ($newMessage as $value):

                    ?>
                      <div class="mail_list">
                        <div class="left">
                          <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                        </div>
                        <div class="right">
                          <h3><?=$value['member_name']?> <small>3.00 PM</small></h3>
                          <p><?=$value['member_message']?></p>
                        </div>
                      </div>
                     
                  <?php

                        endforeach;

                  ?>   
                      
                                         

                    </div>
                    <!-- /MAIL LIST -->


                    <!-- CONTENT MAIL -->
                    <div class="col-sm-9 mail_view">
                      <div class="inbox-body">
                        <div class="mail_heading row">
                          <div class="col-md-8">
                            <div class="compose-btn">
                              
                            </div>

                          </div>
                          <div class="col-md-4 text-right">
                           
                          </div>
                          <div class="col-md-12">
                           
                            <h4>Compose Message</h4>

                            <?php


                     switch ($replyMessage) {
                                case "successful":
                                   echo '
                                    <div class="alert alert-success text-center">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Success!</strong> Message Successfully Replyed.
                                    </div>';
                                    break;
                                case "nope":
                                    echo '
                                    <div class="alert alert-danger text-center">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Sorry!</strong> Message Failed To Reply.
                                    </div>';
                                    break;
                                default:
                                    echo "";
                       }


                  ?>
                            <br>
                          </div>
                        </div>

                        <form method="POST">
                        <div class="sender-info">
                          <div class="row">
                            <div class="col-md-12">
                              <strong style="font-size: 14px;"></strong>
                              <span>Admin</span> to
                              <strong><?php
                                    if (isset($_REQUEST['name'])) {
                                        
                                        echo $_REQUEST['name'];
                                    }
                              ?></strong>
                              <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="sender-info">
                          <div class="row">
                            <div class="col-md-12">
                             <textarea class="form-control" name="message" required="">
                            </textarea>
                            </div>
                          </div>
                        </div>

                        <br>
                       
                      
                        <div class="compose-btn pull-left">
                          

                          <div class="compose-btn pull-right">
                          <a class="btn btn-sm btn-primary" href="messages.php"><i class="fa fa-arrow-left"></i> Back</a>
                          <button type="submit" name="reply" class="btn btn-success btn-sm "><i class="fa fa-mail-reply"></i> Reply</button>
                        </div>
                      </div>
                      </form>
                    </div>
                    <!-- /CONTENT MAIL -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">FunaiCoop Admin by Coltech <!--<a href="https://colorlib.com">Colorlib</a> -->   
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

      </div>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>
