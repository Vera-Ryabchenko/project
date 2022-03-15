<script>
var url = "js/scripts.js";
var url2 = "js/jquery-3.6.0.min.js"
$.getScript(url);
$.getScript(url2);
</script> 
<link rel="stylesheet" href="css/style.css">
<body>
    <br>
    <br>
    <div class="form_radio_group">
	    <div class="form_radio_group-item">
            <input type="radio" name="radio" class="filter-message" id="filter-newmessage">
            <label for="filter-newmessage">Новые заявки</label>
        </div>
        <div class="form_radio_group-item">
            <input type="radio" name="radio" class="filter-message" id="filter-solvemessage">
            <label for="filter-solvemessage">Решенные заявки</label>
        </div>
        <div class="form_radio_group-item">
            <input type="radio" name="radio" class="filter-message" id="filter-escmessage">
            <label for="filter-escmessage">Отклоненные заявки</label>
        </div>
    </div>
    
</body>
<?
    session_start();
    $id = $_SESSION['id'];
    include('settings/config.php');

    $selectuser = $mysqli->query("SELECT id_role FROM `users` WHERE `id` = '$id'");
    $roletype = $selectuser->fetch_object();

    if ($roletype->id_role == 2){
        $selectComments = $mysqli->query("SELECT * FROM `feedback` WHERE `idusers` = '$id' ORDER BY timemessage DESC");
    }
    elseif ($roletype->id_role == 1) {
        $selectComments = $mysqli->query("SELECT * FROM `feedback` ORDER BY timemessage DESC");
    }

    while ($comments = $selectComments->fetch_object()) { 
?>
<div class="lk">
    <div class="<?='comments'.$comments->id;?>" id="lk-messages">
        <p>Тема сообщения: <?=$comments->theme?></p>
        <p>Сообщение: <?=$comments->message?></p>
        <p>Дата и время отправки: <?=$comments->timemessage?></p>

        
        
             
         
        <p>Фото ДО</p>
        <img src="<?="img/" . $comments->image?>" alt="фото ДО" class="feedback-img"><br>
         
               
        <p>Фото ПОСЛЕ</p>
        <? if ($roletype->id_role == 1) {?>
            <label for="messagestatus">Статус заявки:</label>
            <select name="messagestatus" class="messagestatus" id="<?='messagestatus_'.$comments->id;?>">
            <? if ($comments->messagestatus == 'новая') {?>
            <option selected value="новая"><?=$comments->messagestatus?></option>
            <option value="решена">Решена</option>
            <option value="отклонена">Отклонена</option>
        <?}?>
        </select><br>
                
        <?if ($comments->messagestatus == 'отклонена') {?>
        <option selected value="status"><?=$comments->messagestatus?></option>
        </select>
        <?}?>   
        
        <form class="submit-file" id="<?='submitfile_'.$comments->id;?>">
        <input type="file" name="after" id="<?='loadafter_'.$comments->id;?>"><br><br>
        
        <input type="submit" value="Отправить" class="loadafter_submit" id="<?='loadafter_'.$comments->id;?>">
        </form>
        <?}
            elseif ($roletype->id_role == 2){?>
                <label for="messagestatus">Статус заявки: <?=$comments->messagestatus;?></label><br>
           <? }
        ?> 
        
        <?if ($comments->imgafter <> '') {?>
            <img src="<?="img/" . $comments->imgafter?>" alt="фото ПОСЛЕ" class="feedback-img" value="Фото ПОСЛЕ"><br>
         <?}?>
        
        
        <form id="delete">
        <input type="button" value="Удалить заявку" name="delete" id="<?='del_'.$comments->id;?>" class="btn-delete" >
        </form>

        <form action="#">
        <input type="button" value="edit" id="<?='edit_'.$comments->id;?>" class="button">
        </form>        
    </div>
</div>   
<?php
    };
?> 
