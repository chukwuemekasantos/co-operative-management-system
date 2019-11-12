<?php 
    session_start();

    include_once './contoller/insert.php';

    $getMember = new insert();

    $id = isset($_GET['id']);

    $validateMember = $getMember->newPassword($id);

    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <style type="text/css">
        :required:focus{
            color: darkred;
            border-color: darkred;
        }
        #s{
            text-decoration: none;
        }
        #s:hover{
            color: green;
        }
    </style>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup" style="margin-top: -90px;">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <div class="s-12 l-2">
                            <a href="index.php" class="logo" style="font-family:mfg; font-weight: bold; font-size: 33px; color: darkgreen; text-decoration: none;">AE-FUNAI COOP</a>
                        </div>
                        <h2 class="form-title text-center" style="font-weight: normal; font-size: 25px;">New Password</h2>
                        <form method="POST" class="register-form" id="register-form" style="margin-top: -17px;">
                            <?php

                                switch ($validateMember) {
                                   
                                     case 'failed':
                                         echo '

                                            <div class="alert alert-danger">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                Failed To Change Password.
                                            </div>

                                        ';
                                        break;
                                    case 'success':
                                            echo '

                                                <div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                               Your Password Is Change Successfully.
                                            </div>
                                            ';
                                        break;
                                    default:
                                        # code...
                                        break;
                                }

                            ?>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="password" name="new_password" id="email" placeholder="Your New Password" required="" />
                            </div>
                            
                            
                            <div class="form-group form-button">
                                <input type="submit" name="new_pass" id="singin" class="btn btn-sm form-submit" value="Change Password"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link" id="s">Not a member Login</a>
                         <a href="index.php" class="signup-image-link" style="color: darkred;">Cancel</a>
                    </div>
                </div>
            </div>
        </section>  
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
     <script src="css/bootstrap.min.js"></script>
    
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>