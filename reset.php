<?php
require("dbConnection.php");
session_start();
$_SESSION['uname'] = $_POST["username1"];
if (isset($_POST["username1"])) {

    $resp = $db->prepare('SELECT user_id FROM Users WHERE username = :username1');
    $resp->bindParam(':username1', $_POST["username1"]);
    $uname = $_POST["username1"];
    $resp->execute();
    if ($resp->rowCount() == 0) {
        echo "Invalid - credentials";
        header("Location: index.php");
    }
    else {
        header("Location: newpass.php");
    }

}
?>