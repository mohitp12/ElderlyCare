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

$sql = "SELECT * FROM helpers_detail WHERE email = '".$email."' AND pwd = '".$pwd."' LIMIT 1";
$res = mysql_query($sql);

if (mysql_num_rows($res)== 1) {
    //echo "yay";
    $_SESSION['login_session'] = $email;
    header("Refresh:0 ; url=home_h.php");
    exit();
}
else {
    
    echo "<p style = 'color: red'> Please enter a valid username & password.</p>";
    
    
}
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
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                    <div class="login-title" style="text-align:center; font-size:30px;"><strong style=" text-transform:uppercase;">Helper</strong> login</div>
                    <div style="height:25px;">
                    	&nbsp;
                    </div>
                <div class="login-body">
                    <div class="login-title"><strong>Log In</strong> to your account</div>
                    <form action="helper_login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="email" placeholder="Email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="pwd" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <a href="#" class="btn btn-link btn-block"></a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    <div class="login-or">OR</div>
                    <div class="login-subtitle" style="text-align:center;">
                        Don't have an account yet? <a href="#">Create an account</a>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2015 Elderly care
                    </div>
                    <div class="pull-right">
                        
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>

</html>






