<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
</head>
<body>
    <div class="reg-form">
        <h3 class="reg-heading">Для регистрации заполните форму</h3>
        <form> 
        <p>Фио*</p>
            <input type="text" name="fio" placeholder="Введите ФИО" class="reg-fio form-input" id="fio" required>
            <p class="errfio"></p>
    
            <p>Логин*</p>
            <input type="text" name="login" placeholder="Введите логин" class="reg form-input" id="login" required>
            <p class="errlogin"></p>
    
            <p>E-mail*</p>
            <input type="email" name="email" placeholder="Введите e-mail" class="reg form-input" id="email" required>
            <p class="erremail"></p>
    
            <p>Пароль*</p>
            <input type="password" name="password" placeholder="Введите пароль" class="reg form-input" id="pass" required>
            <p class="errpass"></p>
    
            <p>Повторите пароль*</p>
            <input type="password" name="repeatpassword" placeholder="Введите пароль еще раз" class="reg form-input" id="pass-repeat" required><br><br>
            <p class="errpassrepeat"></p>
    
            <input type="checkbox" name="Согласие" required>Согласие на обработку персональных данных</input><br><br>
            <button type="button" class="btn-form" id="btn-form">Зарегистрироваться</button>
            
            <!--<input type="button" value="Зарегистрироваться" class="btn-form">-->
        </form>
        <p id="ans"></p>
        <form action="index.php">
            <button type="submit" class="btn-form" id="toindex2">На главную</button>
        </form>
    </div>
</body>
</html>