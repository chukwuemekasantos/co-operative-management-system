<?php

    include_once './contoller/insert.php';

    $insert = new insert();

    $validateAdmin = $insert->registerAdmin();


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
                        <h2 class="form-title text-center" style="font-weight: normal; font-size: 25px;">Sign Up</h2>
                        <form method="POST" class="register-form" id="register-form" style="margin-top: -17px;">
                            <?php

                                switch ($validateAdmin) {
                                    case 'userfound':
                                        echo '

                                            <div class="alert alert-danger">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                 Sorry, Your is Already Registered.
                                            </div>

                                        ';
                                        break;
                                    case 'success':
                                         echo '

                                            <div class="alert alert-success">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                You Are Successfully Registered.
                                            </div>

                                        ';
                                        break;
                                     case 'nope':
                                         echo '

                                            <div class="alert alert-danger">
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                Invalid Credentials.
                                            </div>

                                        ';
                                        break;
                                    default:
                                        # code...
                                        break;
                                }

                            ?>

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="m_name" id="name" placeholder="Your Name" required="" title="Your Name Is Required" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="m_email" id="email" placeholder="Your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="" />
                            </div>
                             <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="m_pass" id="pass" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="" />
                               
                            </div>
                             <p class="helper-block" style="font-size: 11px; color: darkred; margin-top: -20px;">* Password Should Contain Uppercase, Lower Case and digits</p>
                             <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-email"></i></label>
                                <input type="tel" name="m_phone" id="phone" maxlength="11" placeholder="Your Phone nunmber" pattern="[0-9]{11}" required="" />
                            </div>
                           
                           
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="terms.html" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="signin.php" class="signup-image-link" id="s">I am already member</a>
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

    <script type="text/javascript">
        
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>