<?php 
    include('settings/config.php');
    $newtheme = $_POST['theme'];

    $inserttheme = $mysqli->query("INSERT INTO `thememessage` (`name`) VALUES ('$newtheme')");

?> 