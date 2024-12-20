<?php
require_once '../Models/SpecialtyModel.php';

class SpecialtyController {
    public function getAllSpecialties() {
        $model = new SpecialtyModel();
        try {
            $specialties = $model->fetchAll();
            echo json_encode($specialties); // Retorna o JSON das especialidades
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}

$controller = new SpecialtyController();
$controller->getAllSpecialties();
