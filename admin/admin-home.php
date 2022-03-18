<?php
require_once('../dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Home</title>
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <link href="../css/adminstyle.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-lg-12">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">e-Auction</a>
                
            </nav>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <table class="data">
                    <thead class="table table-hover">
                        <tr>
                            <th>User</th>
                            <th class="name">Role</th>
                            <th class="name">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $sql = "SELECT * from users";
                             try {

                                 $data = $db->query($sql);
                                 $data->setFetchMode(PDO::FETCH_ASSOC);
                             } catch (PDOException $e) {
                                 echo 'ERROR: ' . $e->getMessage();
                             }
                             
                             
                        ?>
                        <?php
                        while ($userinfo = $data->fetch())
                        if($userinfo){
                            if($userinfo['user_id']){
                                echo '
                                <tr style="vertical-align:middle">
                                <td>       
                                ';
                                if ($userinfo['username']) {
                                   print_r($userinfo['username']);
                                }
                                echo '</td>';
                                echo '<td>';
                                if ($userinfo['role_id'] == 1) {
                                    echo "Buyer";
                                } elseif ($userinfo['role_id'] == 2) {
                                    echo "Seller";
                                }
                                echo '</td>';
                                echo '<td>';
                                if($userinfo['user_id']){
                                    echo '<form method="post" action="deleteuser.php">
                                    <input type="submit" name="delete" value="delete" class="btn btn-danger">
                                    <input type="hidden" name="user_id" value="'.$userinfo['user_id'].'">                
                                    
                                    </button>
                                    
                                    ';
                                    echo '</td>';
                                echo '</tr>';
                                }
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</body>

</html>