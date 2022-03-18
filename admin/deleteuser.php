<?php
require_once('../dbConnection.php');

if(isset($_REQUEST['delete'])){
    $sql =" DELETE FROM `users` WHERE user_id='".$_REQUEST['user_id']."' ";
    try {

        $data = $db->query($sql);
        $data->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    header('Location: admin-home.php');
}
?>
