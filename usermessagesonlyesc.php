
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/scripts.js"></script>
<link rel="stylesheet" href="css/style.css">
<body>
    <br>
    </div>
</body>
<?
    session_start();
    $id = $_SESSION['id'];
    include('settings/config.php');

    $selectuser = $mysqli->query("SELECT id_role FROM `users` WHERE `id` = '$id'");
    $roletype = $selectuser->fetch_object();

    if ($roletype->id_role == 2){
        $selectComments = $mysqli->query("SELECT * FROM `feedback` WHERE `idusers` = '$id' AND `messagestatus` = 'отклонена' ORDER BY timemessage DESC");
    }
    elseif ($roletype->id_role == 1) {
        $selectComments = $mysqli->query("SELECT * FROM `feedback` WHERE `messagestatus` = 'отклонена' ORDER BY timemessage DESC");
    }

    while ($comments = $selectComments->fetch_object()) { 
?>
<div class="lk">
    <div class="<?='comments'.$comments->id;?>" id="lk-messages">
        <p>Тема сообщения: <?=$comments->theme?></p>
        <p>Сообщение: <?=$comments->message?></p>
        <p>Дата и время отправки: <?=$comments->timemessage?></p>

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
         
        <p>Фото ДО</p>
        <img src="<?="img/" . $comments->image?>" alt="фото ДО" class="feedback-img"><br>
               
        <p>Фото ПОСЛЕ</p>
        <? if ($roletype->id_role == 1) {?>
        <form class="submit-file" id="<?='submitfile_'.$comments->id;?>">
        <input type="file" name="after" id="<?='loadafter_'.$comments->id;?>"><br><br>
        <input type="submit" value="Отправить" class="loadafter_submit" id="<?='loadafter_'.$comments->id;?>">
        </form>
        <?};?>
        
        <img src="<?="img/" . $comments->imgafter?>" alt="фото ПОСЛЕ" class="feedback-img" value="Фото ПОСЛЕ"><br>
        
        
        <form method="POST">
        <input type="button" value="Удалить заявку" name="delete" id="<?='del_'.$comments->id;?>" class="btn-form" onClick='confirmDelete();'>
        </form>

        <form action="#">
        <input type="button" value="edit" id="<?='edit_'.$comments->id;?>" class="button">
        </form>        
    </div>
</div>   
<?php
    };
?> 
