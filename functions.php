<?php
session_start();
$id = $_SESSION['id'];

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
  $filename = '_'.$id.'_before'.$mime;
  $GLOBALS ['filename'];
  }
  
  
  function make_upload($file, $id){
    $getMime = explode('.', $file['name']);

  $mime = strtolower(end($getMime));

  $types = array('jpg','jpeg');

  $filename = mt_rand(0, 10000) .'_'. $id.'_before'.'.'.$mime;
  copy($file['tmp_name'], 'img/' . $filename);
  }
  ?>