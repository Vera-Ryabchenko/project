<?php 
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'reg';

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->query("SET NAMES 'utf-8'");

    if ($mysqli->connect_errno) {
        echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
    };
?>