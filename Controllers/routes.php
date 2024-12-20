<?php
if ($_SERVER['REQUEST_URI'] === '/get-specialties') {
    include_once '../Controllers/MedicoController.php';
    $controller = new MedicoController();
    $controller->getSpecialties();
}
?>