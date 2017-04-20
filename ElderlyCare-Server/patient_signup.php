<?php

session_start();

$db = "elderly_care";

$link = mysql_connect('aa1kk9on6ht8zuq.co18xzubr35y.us-west-1.rds.amazonaws.com:3306', 'root', 'rootroot');

if(!$link){
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($db, $link);

if (!$db_selected){
    die('can not use' .$db );
}

if (isset($_POST['email'])){
$email = $_POST['email'];
$pwd = $_POST ['pwd'];
$name = $_POST ['name'];
$contact = $_POST ['contact'];
$address = $_POST ['address'];



$sql = "INSERT INTO patients_detail ( name, email, pwd, contact, address) VALUES ('$name', '$email', '$pwd', '$contact', '$address')";
$res = mysql_query($sql);

header("Refresh:0 ; url=patient_login.php");
mysql_close();
}
?>


<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<head>        
        <!-- META SECTION -->
        <title>Atlant - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                               
    </head>
    <body>
        
        <div class="login-container login-v2">
            
            <div class="login-box animated fadeInDown">
                <div class="login-body">
                    <div class="login-title"><strong>Welcome Patient</strong>, Please signup.</div>
                    <form action="patient_signup.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="Name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                </div>                                
                                <input type="email" class="form-control" placeholder="Email" name="email" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                </div>                                
                                <input type="password" class="form-control" name="pwd" placeholder="Password" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                </div>                                
                                <input type="text" class="form-control" placeholder="Contact No." name="contact" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                </div>                                
                                <input type="text" class="form-control" placeholder="Address" name="address" required/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                </div>                                
                                <input type="email" class="form-control" placeholder="Helper ID" name="helper_id"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2015 Elederly care
                    </div>
                    <div class="pull-right">
                        
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>

</html>








