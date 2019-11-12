<?php

  session_start();

  include_once './include/session_auth.php';
 
  include_once '../contoller/insert.php';

  include_once '../contoller/select.php';

    $select = new select();

    $insert = new insert();


     $member_id = $_SESSION['members'][0];

     $member_signature = $_SESSION['members'][1];

     $submitLoan = $insert->submit_loan_form($member_id,$member_signature);

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

                    

                       switch ($submitLoan) {
                                case "success":
                                   echo '

                                    <div class="alert alert-success text-center" style="background-color:darkgreen;">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Success!</strong> Loan Is submitted Successfully.
                                    </div>';
                                    break;
                                case "nope":
                                    echo '

                                    <div class="alert alert-danger text-center" style="background-color:darkred;">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <strong>Sorry!</strong> Failed To Submit Loan.
                                    </div>';
                                    break;

                                 
                                default:
                                    echo "";
                       }
                      //print_r($submitLoan);

                    ?>

            <form method="POST" class="form-horizontal form-label-left input_mask">
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>New Mandate(if any):</label>
                      <input type="text" name="member_new_mandate" class="form-control has-feedback-left" placeholder="New Mandate(if any):">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Amount applied for (in Figures):</label>
                      <input type="text" name="member_load_amount"  class="form-control has-feedback-right" placeholder="Amount applied for (in Figures):" required="required">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Repayment Plan (select the date to start):</label>
                      <input type="date" name="member_load_repayment_month" required="required" class="form-control has-feedback-left" placeholder="Repayment Plan (in Months):">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Repayment Plan (Amount in Figures):</label>
                      <input type="text" name="member_load_repayment_plan" required="required" class="form-control has-feedback-right" placeholder="Repayment Plan (Amount in Figures):">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Bank Name:</label>
                      <input type="text" name="member_bank_name" required="required" class="form-control has-feedback-left" placeholder="Bank Name:">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Bank Branch:</label>
                      <input type="text" name="member_bank_branch" class="form-control has-feedback-right" required="required" placeholder="Bank Branch:">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Account Name:</label>
                      <input type="text" name="member_acc_name"  required="required" class="form-control has-feedback-left" placeholder="Account Name:">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Account Number:</label>
                      <input type="text" name="member_acc_num" 
                      required="required" class="form-control has-feedback-right" maxlength="10" minlength="10" pattern="[0-9]{10,10}" id="inputSuccess2" placeholder="Account Number:">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                   
                   
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Name of First guarantor:</label>
                      <input type="text" name="name_of_mem_first_guarantor" required="required" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Name of First guarantor:">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Signature of first guarantor (use your name):</label>
                      <input type="text" name="sign_of_mem_first_guarantor" required="required" class="form-control has-feedback-right" id="inputSuccess2" placeholder="Signature of first guarantor (use your name):">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Phone Number Of First Guarantor:</label>
                      <input type="text" name="phone_of_mem_first_guarantor" maxlength="11" maxlength="11" pattern="[0-9]{11,11}" required="required" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Phone Number Of First Guarantor:">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Name of second guarantor:</label>
                      <input type="text" name="name_of_mem_sec_guarantor" class="form-control has-feedback-right" required="required" id="inputSuccess2" placeholder="Name of second guarantor:">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Signature of second guarantor (use your name):</label>
                      <input type="text" name="sign_of_mem_sec_guarantor" required="required" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Signature of second guarantor (use your name):">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Phone Number Of Second guarantor</label>
                      <input type="text" name="phone_of_mem_sec_guarantor" class="form-control has-feedback-right" id="inputSuccess2" placeholder="Phone Number Of Second guarantor" maxlength="11" maxlength="11" pattern="[0-9]{11,11}" required="required">
                      <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    
                  

                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                      <div>
                        <strong>
                         <h3>Declaration:</h3> 
                          I declare that the information given here is to the best of my knowledge the truth. I am also aware that any false declaration leads to my forfeiture of the loan I have applied for. <br>
                        </strong>
                      </div>
                    </div>
                    
                
                   
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Print</button>
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" name="submit_loan_form" class="btn btn-success">Submit</button>
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
