<?php
  session_start();

  include_once './include/session_auth.php';

    include_once '../contoller/select.php';

    include_once '../contoller/insert.php';

    $select = new select();

    $member_id = $_SESSION['members'][0];

    $loan_id = $_GET['print'];

   $printInfo = $select->SelectLoanInfoForPrint($member_id,$loan_id);



    
    // $insert = new insert();

    // $l_id = isset($_GET['id']);

    // $approveLoan = $insert->LoanIsApproved($l_id); 

    // $declineLoan = $insert->LoanIsDecline($l_id);

    
    //print_r($select->SelectLoadInfo());

?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>DataTables |FunaiCoop</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">

  <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

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

      <!-- /top navigation -->

  
    <div class="modal fade " id="Decline" role="dialog" style="margin-top: auto;">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header" style="border-style: none;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center">
         <i class="fa fa-remove" style="font-size: 80px; font-weight: normal; color:red;"></i>
          <h4>Decline Loan</h4>
          <br>
           <button type="button" class="btn" data-dismiss="modal" style="background-color: red; color: white;">Yes</button>
        </div>
      
        </div>
      </div>
      
    </div>

  </div>


  

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                    Loan Aprroved Table 
                </h3>
            </div>

            <!--<div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>-->
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  
                </div>
           <div class="x_content">

              <?php

                //print_r($printInfo);

               ?>


              <div class="well well-lg" id="printContent">

                    <div class="container">
                        
                      <div class="container">
                          <div class="container">
                          <h6 style="float: right;">Ref: <?='AE-FUNAI/COOP/'.rand(0,10000)?></h6>
                        <div class="clearfix"></div>
                    <h2 class="text-center" style="font-size: 38px; color: darkgreen;">AE-FUNAI COOP ASSOCIATION</h2>
                    <h4 class="text-center" style="font-size: 31px; color: darkgreen;">LOAN APPROVAL FORM</h4>
        
                <table class="table table-striped">
                   <thead class="text-center">
                       <tr>
                          <th>Name</th>
                          <th>Identification</th>
                          <th>Phone</th>
                        </tr>
                   </thead>
                   <tbody>
                      <tr>
                       <td><?=$_GET['name']?></td>
                       <td> <?php print_r($printInfo[0]['member_id']); ?></td>
                       <td> <?php print_r($printInfo[0]['member_phone']); ?></td>
                      </tr>
                   </tbody>
                    <div class="clearfix"></div>
                   <thead class="text-center">
                       <tr>
                          <th>Loan Amount</th>
                          <th>Payment Plan</th>
                          <th>Payment Month</th>
                        </tr>
                   </thead>
                   <tbody>
                      <tr>
                       <td><?php  print_r($printInfo[0]['member_load_amount']);?></td>
                       <td><?php print_r($printInfo[0]['member_load_amount']);?></td>
                       <td><?php print_r($printInfo[0]['member_load_repayment_month']);?></td>
                      </tr>

                        <?php //print_r($printInfo); ?>
                   </tbody>
                 
                </table>

               <div class="clearfix"></div>
                  <div class="container">
                    <div style="float: right;">
                       <h4 >CHAIRMAN AE-FUNAI COOP </h4>
                        <h5>Signed : Onyemachi Christain John</h5>
                        <h6>Date : <?= Date("nS".' - '."F".' - '."Y")?></h6>
                    </div>
                   
                </div>

              <div class="clearfix"></div>

        <center>
              <div class="btn-group text-center">
                  <button type="submit"  class="btn btn-success btn-md" style="margin-left: 10px;" onclick="print('printContent')">
                      <i class="fa fa-print"> Print</i>
                  </button>
                                  
                </div>
         </center>       
                </div>
              </div>
            </div>
          </div>
        </div>

                  <!--<p class="text-muted font-13 m-b-30">
                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                  </p>-->
                  
                </div>
              </div>
            </div>

            




            

       <script type="text/javascript">
                        
                            

                         $(document).ready(function(){

                            function print(divname){

                              let printContent = document.getElementById(divname).innerHTML;

                              let originalContent = document.body.innerHTML;

                              document.body.innerHTML = printContent;

                              window.print();

                               document.body.innerHTML = originalContent;


                             };    

                          });  



                      </script>






















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

        <script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>


        <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
  <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>
</body>

</html>
