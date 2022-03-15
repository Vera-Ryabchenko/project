<?php 
    session_start();
    $id = $_SESSION['id'];
    include('settings/config.php');
    $id_msg = $_POST['idb'];
    echo $id . " " . $id_msg;

    
    $updatecomments = $mysqli->query("UPDATE `feedback` SET `messagestatus` = 'отклонена' WHERE `id` = $id_msg"); 
?>