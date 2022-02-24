<?php
session_start();
require("dbConnection.php");

    if($_POST["pwd1"]==$_POST["pwd2"]){
        $hpass = sha1($_POST['pwd1'],false);
        $resp = $db->prepare('UPDATE Users SET passwd = :passwd WHERE username = :username1');
        $resp->bindParam(':passwd',$hpass);
        $resp->bindParam(':username1',$_SESSION['uname']);
        $resp->execute();
        if($resp->rowCount() == 0){
            echo "Invalid - credentials";
            header("Location: index.php");
        }else{
            header("Location: index.php");
        }
    }

?>