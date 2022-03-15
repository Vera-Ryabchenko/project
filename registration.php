<?php
   $login = $_POST['formlogin'];
   $pass = $_POST['formpass'];
   $fio = $_POST['formfio'];
   $email = $_POST['formemail'];
   
   include('settings/config.php');

   $selectUser = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$login'");
   $resultUser = $selectUser->fetch_object();

   if ($resultUser) {
       echo "пользователь с таким логином уже существует";
       json_encode(array(
        'data' => "пользователь с таким логином уже существует"
    ));
    } else {
        $addUser = $mysqli->query("INSERT INTO `users` (`id_role`, `login`, `password`, `fio`, `email`)
                    VALUES (2, '$login', '$pass', '$fio', '$email')");

    if ($addUser == true) {
    echo'Вы успешно зарегистрированы';
    } else {
    echo'Запрос не выполнен';
    }
    }
    
?>