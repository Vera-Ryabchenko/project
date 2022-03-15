<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Городской портал</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Логотип сайта" id="logo">
        <div class="header-info">
            <p>Городской портал</p>
            <h1>Сделаем лучше вместе</h1>
        </div>
        <div class="header-forms">
            <form action="index.php" method="POST" class="header-form">
                <button name="entrance" class="header-btn">Войти</button>
            </form>
            <form action="regform.php" method="POST"  class="header-form">
                <button class="header-btn">Регистрация</button>
            </form>
        </div>
    </header>
    <main>
        <div class="main-info">
            <div class="main-info-problem">
                <h2>Яма на дороге</h2>
                <h2>сломалась качель на детской площадке</h2>
                <h2>не горит фонарь!</h2>
                <p>Не хотите оставаться равнодушным к проблемам города</p>
                <p>Сообщите о них!</p>
                <form action="check.php">
                    <button class="main-info-problem-btn" id="btn_problem">Сообщить о проблеме</button>
                </form>
            </div>
            <div class="main-info-img"></div>      
    
        </div>
        <div class="main_messages_counter">
            <h3>Количество решенных проблем</h3>   
        
        <?
            include('settings/config.php'); //подключение к базе 
            $selectComments = $mysqli->query("SELECT COUNT(*) FROM `feedback` WHERE `messagestatus` = 'решена'");
            $comments = $selectComments->fetch_array(MYSQLI_NUM);
        ?>
        <p class="messages_counter"><?=$comments[0];?></p>
        </div>
        <div class="main-problem">
        <?
            //include('settings/config.php'); //подключение к базе 
            $selectComments = $mysqli->query("SELECT * FROM `feedback` ORDER BY timemessage DESC LIMIT 4"); //выбираем комментарии конкретного пользователя
            //$selectComments = $mysqli->query("SELECT timemessage FROM `feedback` ORDER BY timemessage DESC LIMIT 4");
            while ($comments = $selectComments->fetch_object()) { //выводим последние 4 заявки из базы
        ?>
            <div class="main-problem-back">
                <div class="hover">
                    <div class="main-problem-img1" style="background-image:url('<?='img/'.$comments->image;?>')"></div>
                    <div class="main-problem-img2" style="background-image:url('<?='img/'.$comments->imgafter;?>')"></div>
                </div>
                <div>
                    <p>Время поступления заявки: <?=" " . $comments->timemessage;?></p>
                    <p>Тема сообщения: <?=$comments->theme?></p>
                    <p>Категория заявки</p>    
                </div>
            </div> 

            <?php
};
?> 

    </main>
    <footer>
        <p>Порядок работы с обращениями</p>
        <p>Контактные данные</p>    
    </footer>
</body>
</html>