<?php 

session_start();

if(isset($_SESSION['usuario'])) header('Location: view/src/pages/home.php');

else header('Location: view/src/pages/login.php');