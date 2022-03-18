<?php
require("../dbConnection.php");

if(isset($_POST["username"],$_POST["password"])){

    $resp = $db->prepare('SELECT username FROM adm WHERE username = :username AND password = :password');

    

    $resp->bindParam(':username',$_POST["username"]);
    $resp->bindParam(':password',$_POST["password"]);

    $resp->execute();

    if($resp->rowCount() == 1){
        echo "Invalid - credentials";
        header("Location: admin-home.php",true,303);
        
    }else{
        echo "Invalid";
        header("Location: index.php",true,303);
    }
}
