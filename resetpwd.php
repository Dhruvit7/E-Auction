<?php
require_once('dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset-Password/e_Auction</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/resetpwd.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">e-Auction</a>
                    </div>
                </div>
            </nav>

            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">Reset Password</div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="reset.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
<<<<<<< HEAD
                                        <input type="text" name="username1" id="username1" tabindex="1" class="form-control" placeholder="Enter Username" value="">
=======
                                        <input type="text" name="username1" id="username1" tabindex="1" class="form-control" placeholder="Enter User name" value="">
>>>>>>> 1caeeba923f8369a3b72665ad07102a60b00d049
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Reset Password">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>