<?php

     session_start();

     include_once './include/session_auth.php';

    include_once '../contoller/insert.php';

    include_once '../contoller/select.php';

     $select = new select();

      $insert = new insert();

       $member_id = $_SESSION['members'][0];

     $member_signature = $_SESSION['members'][1];

    
    $checkMembers = $select->checkIfMemberIsReg($member_id);

    $submitLoan = $insert->submit_loan_form($member_id,$member_signature);

    

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


     <?php

      include_once("./include/sidebar.php");

    ?>

      <!-- top navigation -->
    <?php

        include_once("./include/navbar.php");

    ?>

      </div>

   
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>LOAN REQUEST FORM</h3>
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
              <div class="x_panel">
                <div class="x_title">
                  <h2>(This Loan form must be completed and submitted to the General Secretary)<br><strong>print the form on copletion</strong></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form method="POST" class="form-horizontal form-label-left input_mask">


                    <?php

                      print_r($submitLoan);

                    ?>

                   
                   <!--  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Full Name</label>
                      <input type="text" name="" class="form-control has-feedback-left"  placeholder="First Name" required="required" >
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Phone Number</label>
                      <input type="text" name="" class="form-control has-feedback-left"  placeholder="Phone Number" required="required" >
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Department/Unit</label>
                      <input type="text" name="" required="required" class="form-control has-feedback-right"  placeholder="Department/Unit">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Category</label>
                      <select required="required" class="form-control has-feedback-left">
                        <option>Category</option>
                        <option>Teaching</option>
                        <option>Non-Teaching</option>
                      </select>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Rank/Designation</label>
                      <input type="text" name="" required="required" class="form-control has-feedback-right"  placeholder="Rank/Designation">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div> 
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Name Of Next of Kin</label>
                      <input type="text" name="" required="required" class="form-control has-feedback-left"  placeholder="Name Of Next of Kin">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Address Of Next of Kin</label>
                      <input type="text" name="" required="required" class="form-control has-feedback-right"  placeholder="Address Of Next of Kin">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Phone Number Of Next of Kin</label>
                      <input type="text" name="" required="required" class="form-control has-feedback-left"  placeholder="Phone Number Of Next of Kin">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Relationship of Next of Kin</label>
                      <input type="text" name="" class="form-control has-feedback-right" required="required" placeholder="Relationship of Next of Kin">
                      <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Date of Joining The Cooperative</label>
                      <input type="date" required="required" class="form-control has-feedback-left" placeholder="Date of Joining The Cooperative">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Membership Number</label>
                      <input type="text" name="" required="required" class="form-control has-feedback-right" placeholder="Membership Number">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Salary Scale</label>
                      <select required="required" class="form-control has-feedback-left">
                        <option>Salary Scale</option>
                        <option>CONUASS</option>
                        <option>CONTISS</option>
                      </select>
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Salary Scale: Level</label>
                      <input type="text" name="" required="required" class="form-control has-feedback-right"  placeholder="Salary Scale: Level">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Salary Scale: Step</label>
                      <input type="text" name="" required="required" class="form-control has-feedback-left"  placeholder="Salary Scale: Step">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Outstanding Loan to the Cooperative:(Amount in Figures)</label>
                    <input type="text" name="" class="form-control has-feedback-right" required="required" placeholder="Outstanding Loan to the Cooperative:(Amount in Figures)">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div> -->
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>New Mandate(if any):</label>
                      <input type="text" name="member_new_mandate" required="required" class="form-control has-feedback-left" placeholder="New Mandate(if any):">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Amount applied for (in Figures):</label>
                      <input type="text" name="member_load_amount" required="required" class="form-control has-feedback-right" placeholder="Amount applied for (in Figures):">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Repayment Plan (in Months):</label>
                      <input type="month" name="member_load_repayment_plan" required="required" class="form-control has-feedback-left" placeholder="Repayment Plan (in Months):">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Repayment Plan (Amount in Figures):</label>
                      <input type="text" name="member_load_repayment_month" required="required" class="form-control has-feedback-right" placeholder="Repayment Plan (Amount in Figures):">
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
                      <input type="text" name="member_acc_name" required="required" class="form-control has-feedback-left" placeholder="Account Name:">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Account Number:</label>
                      <input type="text" name="member_acc_num" 
                      required="required" class="form-control has-feedback-right" id="inputSuccess2" placeholder="Account Number:">
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
                      <input type="text" name="phone_of_mem_first_guarantor" required="required" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Phone Number Of First Guarantor:">
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
                      <input type="text" name="phone_of_mem_sec_guarantor" class="form-control has-feedback-right" id="inputSuccess2" placeholder="Phone Number Of Second guarantor" required="required">
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
                    
                
                    </div>
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Print</button>
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" name="submit_loan_form" class="btn btn-success">Submit</button>
                      </div>
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
  <script type="text/ name=""javascript" src="js/moment/moment.min.js"></script>
  <script type="text/ name=""javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- richtext  name=""editor -->
  <script src="js/editor/bootstrap-wysiwyg.js"></script>
  <script src="js/editor/external/jquery.hotkeys.js"></script>
  <script src="js/editor/external/google-code-prettify/prettify.js"></script>
  <!-- select2 -->
  <script src="js/select/select2.full.js"></script>
  <!-- form validation -->
  <script type="text/ name=""javascript" src="js/parsley/parsley.min.js"></script>
  <!-- texta name=""rea resize -->
  <script src="js/texta name=""rea/autosize.min.js"></script>
  <script>
    autosize($('.resizable_texta name=""rea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/ name=""javascript" src="js/autocomplete/countries.js"></script>
  <script src="js/autocomplete/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script type="text/ name=""javascript">
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
  <script type="text/ name=""javascript">
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
