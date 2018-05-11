<?php session_start();
ob_start();

if(isset($_SESSION['patientuserid']))
{
    header("Location: dashboard.php");
}

include "config.php";
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Video Chat - Patient Portal</title>
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
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo-txt" style="font-size:48px;color:#fff;">PATIENT PORTAL</div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome User</strong>, Please login</div>
                    <form action="dologin.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="email" placeholder="E-Mail"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" type="submit" name="login">Log In</button>
                        </div> 
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?php echo date('Y'); ?> Video Chat
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>