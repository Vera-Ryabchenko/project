<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h2 class="auth-heading">Добро пожаловать на наш сервис</h2>
  <div class="auth-form" id="forms">
    <form action="auth.php" method="POST">
      <p>Логин*</p>
      <input type="text" name="login" placeholder="Логин"><br><br>

      <p>Пароль*</p>
      <input type="password" name="password" placeholder="Пароль"><br><br>
    
      <input type="checkbox" name="approval" required>Согласие на обработку персональных данных</input><br><br>
    
      <input type="submit" value="Войти" class="btn-form">
    </form>

    <p>Нет учетной записи? <a href="index.php" id="newaccount">Зарегистрируйся</a></p>
  </div>
</body>
</html>