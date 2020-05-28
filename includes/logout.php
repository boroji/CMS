<?php session_start(); ?>

<?php

$_SESSION['username'] = null;
$_SESSION['user_name'] = null;
$_SESSION['user_password'] = null;

header("Location: ../index.php")


?>