<?php
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обратная связь</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>    
    <form action="feedback.php" method="POST" enctype="multipart/form-data">
    <select name="theme" class="select" id="thememessage">
    <?
            include('settings/config.php'); //подключение к базе 

            $selectuser = $mysqli->query("SELECT id_role FROM `users` WHERE `id` = '$id'");
            $roletype = $selectuser->fetch_object();

    
            $selectthemes = $mysqli->query("SELECT * FROM `thememessage`"); 
            while ($themes = $selectthemes->fetch_object()) { 
    
        echo"<option value='$themes->name'>$themes->name</option>";
    };?> 
        
    </select>
    <br><br>
    <br><br><textarea name="message" cols="50" rows="10"></textarea> <br><br>
    <p>Загрузить фото ДО</p>
    <input type="file" name="file"><br><br>
    
    <input type="submit">
    </form>
    <br><br>

    <? if ($roletype->id_role == 1){?>
    <form>
        <input type="text" placeholder="Введите новую категорию заявок" id="nameaddcategorymessage">
        <input type="submit" value="добавить категорию заявок" id="addcategorymessage">
        

        <br><br>
        <select name="thememessagefordel" id="thememessagefordel">    
    <?    $selectthemes = $mysqli->query("SELECT * FROM `thememessage`"); //выбираем комментарии конкретного пользователя

while ($themes = $selectthemes->fetch_object()) {

echo"<option value='$themes->name'>$themes->name</option>";}?>
</select>
<input type="button" value="удалить категорию заявок" id="delcategorymessage">
    </form>
    <?}?>

    <br><br> 
</body>
    </html> 