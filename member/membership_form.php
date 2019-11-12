<?php

  session_start();

include_once './include/session_auth.php';
 
  include_once '../contoller/insert.php';

  include_once '../contoller/select.php';

    $checkMember = new select();

    $getMember = new insert();

    $member_id = $_SESSION['members'][0];

    $add_member = $getMember->add_member($member_id);

    // if ($checkMember->checkIfMemberIsReg($member_id) == 'user_registered') {
        
    //     header('location:index.php'.'?'.'message=success');

    // }

    // $checkMembers = $checkMember->checkIfMemberIsReg($member_id);

    // print_r($checkMember);

?>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Membership Form | </title>

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

    include_once './include/sidebar.php';

   ?>

      <!-- top navigation -->
    <?php

      include_once './include/navbar.php';

    ?>

  </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Membership Form</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                <div class="x_title">
                  <h2>Please<small>Fill the form to be a full member</small></h2>


                 
                 <!--  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul> -->
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />

                  <?php


                     switch ($add_member) {
                                case "success":
                                   echo '
                                    <div class="alert alert-success">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Success!</strong> Your Now A Member Of AE-Funai Coop.
                                    </div>';
                                    break;
                                case "too_large":
                                    echo '
                                    <div class="alert alert-danger">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Sorry!</strong> Your Passport Is To Large.
                                    </div>';
                                    break;
                                case 'failed_to_upload_file':
                                     echo '
                                    <div class="alert alert-danger">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Sorry!</strong> Failed To Register.
                                    </div>';
                                    break;
                                default:
                                    echo "";
                        }


                  ?>
                  <form method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left input_mask">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" name="m_name" class="form-control has-feedback-left" value="<?=$_SESSION['members'][1]?>"  placeholder="Full Name" required="" readonly>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <select name="m_gender"  class=" form-control" required="">
                        <option value="">Select Gender</option>
                        <option value="male">male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" name="m_dapart" class="form-control has-feedback-left"  placeholder="Depatrment" required="">
                      <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" name="m_desg" class="form-control" placeholder="Designation" required="" readonly="">
                      <span class="fa fa-pen form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"> 
                      <input type="text" name="m_phone" class="form-control has-feedback-left" placeholder="Phone" value="<?=$_SESSION['members'][4]?>" required="" readonly>
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>


                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <select name="m_categ"  class=" form-control" required="">
                        <option value="">Select Category</option>
                       <option value="Teaching">Teaching</option>
                       <option value="Non Teaching">Non-Teaching</option>
                      </select>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" name="m_nok" class="form-control has-feedback-left"  placeholder="Name of Next of Kin" required="">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" name="m_ocup" class="form-control" placeholder="next Of Kin Occupation" required="">
                      <span class="fa fa-briefcase form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" name="m_aonok" class="form-control has-feedback-left"  placeholder="Next of Kin Address" required="">
                      <span class="fa fa-location-arrow form-control-feedback left" aria-hidden="true"></span>
                    </div>

                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" name="m_nok_phone" class="form-control has-feedback-left"  placeholder="Next of Kin Phone Number"  pattern="[0-9]{11,11}" maxlength="11" minlength="11" required="">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                       <input type="file" name="m_passport" id="file1" class="form-control"  required="">
                      <label>Upload Your Passport</label>
                       <!-- <input type="button" name="m_passport" id="bt" class="form-control btn btn-success"  onclick="document.getElementById('file1').click();" value="Upload Passport">
                       <h6 id="filename"></h6> -->
                       
                      
                     
                    
                      <!-- <script type="text/javascript">
                        $(document).ready(function() {
                          $('#bt').on('change',function(){

                               document.getElementById('filename').innerHTML = document.getElementById('file1').name;

                          });   
                        });
                         
                       </script> -->
                    </div>

                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" name="m_d_amount" class="form-control has-feedback-left"  placeholder="Amount to be deduce from your salary (in Figures) " pattern="[0-9]{1,12}"  required="">
                      <span class="fa fa-cc-mastercard form-control-feedback left" aria-hidden="true"></span>
                    </div>


                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <input type="text" name="m_signature" class="form-control" value="<?=$_SESSION['members'][1]?>" placeholder="Enter Signature" required="" readonly>
                      <span class="fa fa-hand-paper-o form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <div class="clearfix"></div>

                    
                    <div class="ln_solid"></div>
                    
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                      <input type="submit" class="form-control btn btn-danger" value="Cancel">
                    
                    </div>


                     <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                       <input type="submit" name="add_member" class="form-control  btn btn-success" value="Register">
                    
                    </div>

                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">FunaiCoop Admin by Coltech <!--<a href="https://colorlib.com">Colorlib</a>-->
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

  <script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

<script type="text/javascript">
  
 function reg_member(){
  

            //let myform = $('#form')[0];
          
       $( "#form" ).submit(function( event ) {

         let data = document.getElementById('form');

        let formdata = new FormData(this);


        let form = $('#form').serializeArray();

        //formData.append('name', "chisom");

   // console.log(formData);

        console.log(formdata);
//} );


    });    

}
//   // let ajaxReq = 

//    // $.ajax({
//    //  url: "./postapi.php?page=profile",
//    //  type: "post",
//    //  data : data

//    // });
    
//    //  ajaxReq.done(function(res, statusText,callback){
//    //    console.log(`${res} and ${statusText}`);
//    //    $("#message").show();
//    //      $("#formforprofile").slideUp(100);
//    //    $("#message").fadeOut(4000);
//    //      $("#formforprofile").show(100);

//    //  });

//    //  ajaxReq.fail(function(){
//    //    console.log("sum tin went wrog")
//    //  });
//    //      event.preventDefault();
//    //  });

// }

</script>
  

  <script src="js/custom.js"></script>
  <!-- form wizard -->
  <script type="text/javascript" src="js/wizard/jquery.smartWizard.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script type="text/javascript">


//   

    $(document).ready(function() {
      // Smart Wizard
      $('#wizard').smartWizard();

      function onFinishCallback() {
        $('#wizard').smartWizard('showMessage', 'Finish Clicked');
        //alert('Finish Clicked');
      }
    });

    $(document).ready(function() {
      // Smart Wizard
      $('#wizard_verticle').smartWizard({
        transitionEffect: 'slide'
      });

    });
  </script>

</body>

</html>
