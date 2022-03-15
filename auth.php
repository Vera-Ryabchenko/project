<?php
   $login = $_POST['login'];
   $pass = $_POST['password'];
   include('settings/config.php');
   
   
   $selectUser = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
   
   
   $resultUser = $selectUser->fetch_object();
   
   
    if ($resultUser) {
        session_start();
        $_SESSION['id']=$resultUser->id;
        $_SESSION['fio']=$resultUser->fio;
        header("location:options.php"); 
    }
    else {
        echo "Введите правильные логин и пароль";
    };
?>