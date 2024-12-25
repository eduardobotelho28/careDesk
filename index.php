<?php 

session_start();

if (isset($_SESSION['usuario'])) header('Location: view/src/pages/home.php');

<<<<<<< HEAD

else header('Location: view/src/pages/login.php');
=======
else header('Location: view/src/pag es/login.php');
>>>>>>> f3858e231892cc5ac2314a512a511179f8c3e572
