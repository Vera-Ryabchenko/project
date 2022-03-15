<?php 
    session_start();
    $id = $_SESSION['id'];
    include('settings/config.php');
    $after = $_POST['this_idobj'];

    function can_upload($file){

        if($file['name'] == '')
        return 'Вы не выбрали файл.';
      
      
      if($file['size'] == 1048576)
        return 'Файл слишком большой.';
      
      
      $getMime = explode('.', $file['name']);
      
      $mime = strtolower(end($getMime));
      
      $types = array('jpg','jpeg');
      
      $size = 1048576;
      if(!in_array($mime, $types))
        return 'Недопустимый тип файла.';
      
      return true;
      $filename = '_'.$id.'_after'.$mime;
      }
      
      
      function make_upload($file, $id){
        $getMime = explode('.', $file['name']);
      
      $mime = strtolower(end($getMime));
      
      $types = array('jpg','jpeg');
      global $filename;
      $filename = mt_rand(0, 10000) .'_'. $id.'_after'.'.'.$mime;
      copy($file['tmp_name'], 'img/' . $filename);
      }
      
      if(isset($_FILES['after'])) {
      
        $check = can_upload($_FILES['after']);
          
        if($check === true){
      
              make_upload($_FILES['after'], $id);
              echo "<strong>Файл успешно загружен!</strong>";
            }
            else{
      
               echo "<strong>$check</strong>";  
            }
          }

    
          $addimgafter = $mysqli->query("UPDATE `feedback` SET `imgafter` = '$filename', `messagestatus` = 'решена' WHERE `id` = $after");
    if ($addimgafter == true) {
      echo'Картинка загружена';
    }
    else {
      echo'Запрос на отправку изображения не выполнен';
    } 
?>