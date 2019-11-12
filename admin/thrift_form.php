<?php
    
    session_start();

    include_once './include/session_auth.php';

    include_once '../contoller/select.php';

     include_once '../contoller/insert.php';

    $member_id = $_SESSION['members'][0];

    $select = new select();

    $insert = new insert();

    $getInfo = $select->SelectInfoForThriftForm($member_id);

    $Sendform = $insert->submit_thrift_form();

    //print_r($getInfo);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>FunaiCoop! | </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">
  <!-- editor -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
  <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="css/editor/index.css" rel="stylesheet">
  <!-- select2 -->
  <link href="css/select/select2.min.css" rel="stylesheet">
  <!-- switchery -->
  <link rel="stylesheet" href="css/switchery/switchery.min.css" />

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


    <div class="main_container">


      <!-- top navigation -->
   <?php

           include_once './include/sidebar.php';

        include_once './include/navbar.php';

   ?>

  </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>THRIFT CONTRIBUTION FORM</h3>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
          </div>

          <script type="text/javascript">
            $(document).ready(function() {
              $('#birthday').daterangepicker({
                singleDatePicker: true,
                calender_style: "picker_4"
              }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
              });
            });
          </script>


          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel" id="printContent">
                <div class="x_title">
                  <h2 id="ti">(This Thrift form must be completed in triplicate and submitted to the Office of the Secretary)</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />

                  <?php

                        foreach ($getInfo as $value) {
                          
                        }
                         


                     switch ($Sendform) {
                                case "success":
                                   echo '
                                    <div class="alert alert-success text-center">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close"><span color="white;">&times;</span></a>
                                      <strong>Success!</strong> Your Thrift Form Is Submitted Successfully.
                                     
                                    </div>
                                    ';
                                    break;
                                case "nope":
                                    echo '
                                    <div class="alert alert-danger text-center">
                                      <a href="#" class="close" data-dismiss="alert" aria-label="close"><span color="white;">&times;</span></a>
                                      <strong>Sorry!</strong> Failed To Submit Your Thrift Form.
                                    </div>';
                                    break;
                                default:
                                    echo "";
                        }

                  ?>
                  <form method="POST" class="form-horizontal form-label-left input_mask" id="t_form.php">
                    
              
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Full name</label>
                      <input type="text" name="member_name" value="<?=$value[0]?>" class="form-control has-feedback-left" placeholder="Full Name" required="" readonly>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                   
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Member Department</label>
                      <input type="text" name="member_department" value="<?=$value[1]?>" class="form-control has-feedback-left"  placeholder="Department/Unit" readonly>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Member Phone</label>
                      <input type="text" name="member_phone" value="<?=$value[3]?>" class="form-control has-feedback-left" placeholder="Phone Number" readonly>
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Member Category</label>
                      <select name="member_category" class="form-control has-feedback-left" readonly>
                        <?php
                          if (!empty($value[4])):
                        ?>
                           <option value="<?=$value[4]?>" readonly><?=$value[4]?></option>
                        <?php

                          else:

                        ?>
                        <option value="">Category</option>
                        <option value="Teaching">Teaching</option>
                        <option value="Non Teaching">Non-Teaching</option>
                        <?php
                          endif;
                        ?>
                        
                      </select>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>member designation</label>
                      <input type="text" name="member_designation" value="<?=$value[2]?>" class="form-control has-feedback-left"  placeholder="Rank/Designation" readonly>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Member Next Of Kin Name</label>
                      <input type="text" name="member_nof_kin_name" value="<?=$value[5]?>" class="form-control has-feedback-left"  placeholder="Name Of Next of Kin" readonly>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Address Of Next of Kin</label>
                      <input type="text" name="member_nof_kin_add" value="<?=$value[7]?>" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Address Of Next of Kin" readonly>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Phone Number Of Next of Kin</label>
                      <input type="text" name="member_nof_kin_phone" value="<?=$value[8]?>" class="form-control has-feedback-left" placeholder="Phone Number Of Next of Kin" readonly>
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Date of Joining The Cooperative</label>
                      <input type="text" name="dof_of_joining" value="<?=$value[12]?>" class="form-control has-feedback-left" placeholder="Date of Joining The Cooperative" readonly>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Membership Number</label>
                      <input type="text" name="member_id" value="<?=$value[11]?>" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Membership Number" readonly>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Salary Scale</label>
                      <select class="form-control has-feedback-left" name="member_salary_scale" required="">
                        <option value="">Salary Scale</option>
                        <option value="CONUASS">CONUASS</option>
                        <option value="CONTISS">CONTISS</option>
                      </select>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Salary Scale: Level</label>
                      <input type="text" name="member_salary_scale_level" class="form-control has-feedback-left"  placeholder="Salary Scale: Level" required="">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Salary Scale: Step</label>
                      <input type="text" name="member_salary_scale_step" class="form-control has-feedback-left" placeholder="Salary Scale: Step" required="">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Amount to contriute monthly:(Amount in Figures)</label>
                      <input type="concrency" name="member_monthly_contribute" class="form-control has-feedback-left" placeholder="Amount to contriute monthly:(Amount in Figures)" required="">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Effective Month</label>
                      <input type="month" name="member_month_to_start_contribution" class="form-control has-feedback-left" placeholder="Effective Month:" required="">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Signature:(use your name)</label>
                      <input type="text" name="member_sign" value="<?=$value[10]?>" class="form-control has-feedback-left"  placeholder="Signature:(use your name)" readonly>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  
                  <div id="h"> 
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <div>
                        <h3>Declaration:</h3>  I declare that the information given here is to the best of my knowledge the truth.<br>
                        <h3>Note:</h3>Thrift amount is refundable at the end of reach year it was subscribed for with interest rate as may be agreed at the AGM.<br>
                        <strong>Total thrift amount per year do not rank for dividend. ONLY normal cumulative contribution amount ranks for dividend </strong>
                      </div>
                    </div>

                    <div class="clearfix"></div>
                   
                    <div class="col-md-4" style="margin-top: 20px;" id="h2">

                          <input type="submit" class="btn btn-success form-control" onclick="printDiv('printContent')" value="Print" />
                    </div>

                    <div class="col-md-4" style="margin-top: 20px;" id="h2">

                         <input  type="Print" class="btn btn-danger form-control" value="Cancel">
                    </div>

                    <div class="col-md-4" style="margin-top: 20px;" id="h3">

                         <input type="submit" name="submit_thrift_form" class="btn btn-success form-control" value="Submit">
                    </div>
                    </div>
                  </div>
                  

                     <script type="text/javascript">
                        
                            function printDiv(divname) {

                              document.getElementById('ti').innerHTML = "THRIFT CONTRIBUTION FORM";

                               document.getElementById('h').style.display="none";


                              let printContent = document.getElementById(divname).innerHTML;

                              let originalContent = document.body.innerHTML;

                              document.body.innerHTML = printContent;

                              window.print();

                               document.body.innerHTML = originalContent;


                            }

                      </script>
                      
                    </div> 
                  </form>
                </div>
              </div>                
            </div>
          </div>
          
        </div>
        <!-- /page content -->

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

    </div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- tags -->
  <script src="js/tags/jquery.tagsinput.min.js"></script>
  <!-- switchery -->
  <script src="js/switchery/switchery.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- richtext editor -->
  <script src="js/editor/bootstrap-wysiwyg.js"></script>
  <script src="js/editor/external/jquery.hotkeys.js"></script>
  <script src="js/editor/external/google-code-prettify/prettify.js"></script>
  <!-- select2 -->
  <script src="js/select/select2.full.js"></script>
  <!-- form validation -->
  <script type="text/javascript" src="js/parsley/parsley.min.js"></script>
  <!-- textarea resize -->
  <script src="js/textarea/autosize.min.js"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="js/autocomplete/countries.js"></script>
  <script src="js/autocomplete/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script type="text/javascript">
    $(function() {
      'use strict';
      var countriesArray = $.map(countries, function(value, key) {
        return {
          value: value,
          data: key
        };
      });
      // Initialize autocomplete with custom appendTo:
      $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray,
        appendTo: '#autocomplete-container'
      });
    });
  </script>
  <script src="js/custom.js"></script>


  <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <!-- /select2 -->
  <!-- input tags -->
  <script>
    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }

    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input, tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {
      $('#tags_1').tagsInput({
        width: 'auto'
      });
    });
  </script>
  <!-- /input tags -->
  <!-- form validation -->
  <script type="text/javascript">
    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  <!-- /form validation -->
  <!-- editor -->
  <script>
    $(document).ready(function() {
      $('.xcxc').click(function() {
        $('#descr').val($('#editor').html());
      });
    });

    $(function() {
      function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'
          ],
          fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function(idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
        });
        $('a[title]').tooltip({
          container: 'body'
        });
        $('.dropdown-menu input').click(function() {
            return false;
          })
          .change(function() {
            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
          })
          .keydown('esc', function() {
            this.value = '';
            $(this).change();
          });

        $('[data-role=magic-overlay]').each(function() {
          var overlay = $(this),
            target = $(overlay.data('target'));
          overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });
        if ("onwebkitspeechchange" in document.createElement("input")) {
          var editorOffset = $('#editor').offset();
          $('#voiceBtn').css('position', 'absolute').offset({
            top: editorOffset.top,
            left: editorOffset.left + $('#editor').innerWidth() - 35
          });
        } else {
          $('#voiceBtn').hide();
        }
      };

      function showErrorAlert(reason, detail) {
        var msg = '';
        if (reason === 'unsupported-file-type') {
          msg = "Unsupported format " + detail;
        } else {
          console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
          '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
      };
      initToolbarBootstrapBindings();
      $('#editor').wysiwyg({
        fileUploadError: showErrorAlert
      });
      window.prettyPrint && prettyPrint();
    });

  </script>

   
  <!-- /editor -->
</body>

</html>
