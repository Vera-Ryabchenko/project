<?php
session_start();
?>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="css/style.css">
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Опции личного кабинета</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
<body class="body_options">
    <div class="options">
        <p class="options_p">Личный кабинет пользователя:<br><?echo " ".$_SESSION['fio'];?></p>
        <div class="options_btn">    
            <form action="logout.php" method="POST" >
                <input type="submit" value="Выйти" name="exit" class="options_btn-form">
            </form><br>

            <form>
                <input type="submit" value="Создать заявку" name="more" id="btn_new-message" class="options_btn-form">
            </form><br>

            <form>
                <input type="submit" value="Мои заявки" name="more" id="btn_all-messages" class="options_btn-form">
            </form><br>

            <form action="index2.php" method="POST">
                <input type="submit" value="На главную" name="more" class="options_btn-form">
            </form><br>
        </div>
    </div>
    <!--<div class="form_radio_group">
	    <div class="form_radio_btn">
            <input type="radio" name="radio" class="filter-message" id="filter-newmessage">
            <label for="filter-newmessage" class="input-label">Новые заявки</label>
        </div>
        <div class="form_radio_btn">
            <input type="radio" name="radio" class="filter-message" id="filter-solvemessage">
            <label for="filter-solvemessage" class="input-label">Решенные заявки</label>
        </div>
        <div class="form_radio_btn">
            <input type="radio" name="radio" class="filter-message" id="filter-escmessage">
            <label for="filter-escmessage" class="input-label">Отклоненные заявки</label>
        </div>
    </div> -->   
    <div class="form_radio_group">
            <input type="radio" name="radio" class="filter-message" id="filter-newmessage">
            <label for="filter-newmessage" class="input-label">Новые заявки</label>
        
        
            <input type="radio" name="radio" class="filter-message" id="filter-solvemessage">
            <label for="filter-solvemessage" class="input-label">Решенные заявки</label>
       
            <input type="radio" name="radio" class="filter-message" id="filter-escmessage">
            <label for="filter-escmessage" class="input-label">Отклоненные заявки</label>
       
    </div>
    <div id="content-lk">
    
    </div>
</body>
</html> 