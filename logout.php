<?php
session_start();
unset($_SESSION['id'], $_SESSION['fio']);
session_unset();
if (session_status() == PHP_SESSION_ACTIVE) { session_destroy(); }
header("Location: index2.php");
?> 