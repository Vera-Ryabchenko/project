<?php
session_start();
include('settings/config.php');


$theme = $_POST['theme'];
$message = $_POST['message'];
$timemessage = date('Y-m-d H:i:s');
$id = $_SESSION['id'];


function can_upload($file){

  if($file['name'] == '') 
  return 'Вы не выбрали файл.';

  if($file['size'] > 10485760) {
    
  return 'Файл слишком большой.';
  };
 

$getMime = explode('.', $file['name']);

$mime = strtolower(end($getMime));

$types = array('jpg','jpeg', 'png', 'bmp');


if(!in_array($mime, $types))
  return 'Недопустимый тип файла.';

return true;
$filename = '_'.$id.'_before'.$mime;
}


function make_upload($file, $id){
  $getMime = explode('.', $file['name']);

$mime = strtolower(end($getMime));

$types = array('jpg','jpeg', 'png', 'bmp');
global $filename;
$filename = mt_rand(0, 10000) .'_'. $id.'_before'.'.'.$mime;
copy($file['tmp_name'], 'img/' . $filename);
}

if(isset($_FILES['file'])) {

  $check = can_upload($_FILES['file']);

  if($check === true){

    make_upload($_FILES['file'],$id);
    echo "<strong>Файл успешно загружен!</strong>";
  }
  else{

    echo "<strong>$check</strong>";  
  }
} 

$addMessage = $mysqli->query("INSERT INTO `feedback` (`idusers`,`theme`, `message`, `timemessage`,`image`, `imgafter`, `messagestatus`)
                             VALUES ('$id', '$theme', '$message', '$timemessage', '$filename', '', 'новая')");



if ($addMessage == true) {
    echo'Заявка отправлена';
}
else {
    echo'Запрос на отправку заявки не выполнен';
} 

 
echo"<br>";
echo"<br>";
?> 
<!DOCTYPE html>
  <html lang="ru">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/style.css">
      <title>Обратная связь</title>
  </head>
  <body class="body_options">
  <form action="options.php" method="POST" >
    <input type="submit" value="Перейти в личный кабинет" class="btn-form" name="more">
  </form>   
  </body>
  </html> 
