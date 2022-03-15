<?php 
    include('settings/config.php');
    $newtheme = $_POST['theme'];

    $delComments = $mysqli->query("DELETE FROM `feedback` WHERE `theme` = '$newtheme'");

    $deltheme = $mysqli->query("DELETE FROM `thememessage` WHERE `name` = '$newtheme'");
?> 