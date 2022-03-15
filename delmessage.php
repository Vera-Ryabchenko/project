<?php 
    session_start();
    $id = $_SESSION['id'];
    include('settings/config.php');
    $id_button = $_POST['idb'];
    echo $id . " " . $id_button;

    
    $deletecomments = $mysqli->query("DELETE FROM `feedback` WHERE `id` = '$id_button'"); 
?>