<?php
session_start();
if($_SESSION['id'] ?? ""){
    header("Location: options.php");
}else header("Location: index.php");
?> 