<?php
session_start();
$_SESSION = array();
session_destroy();

setcookie('token', '', time() - 3600);

header("Location: /Hackathon%202023/login.php");
exit;
?>