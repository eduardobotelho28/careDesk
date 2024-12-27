<?php
require_once __DIR__ . '/../../../Models/DoctorModel.php';

$doctorModel = new DoctorModel();
$doctors = $doctorModel->getDoctors();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/main_pages.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" />
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>Doctor | CareDesk</title>
    <script src="../assets/js/header.js" defer></script>
    <script src="../assets/js/modal-doctor.js" defer></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="container">
        <h1>Médicos Registrados</h1>
        <div class="action-buttons">
            <a href="register-doctor.php" class="add-button">Adicionar novo Doutor</a>
        </div>
        <table class="doctor-table">
            <thead>
                <tr>
                    <th>CRM</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($doctors)) : ?>
                    <?php foreach ($doctors as $doctor) : ?>
                        <tr data-id="<?= htmlspecialchars($doctor['idMedicos']); ?>">
                            <td><?= htmlspecialchars($doctor['crm']); ?></td>
                            <td><?= htmlspecialchars($doctor['nome']); ?></td>
                            <td><?= htmlspecialchars($doctor['sobrenome']); ?></td>
                            <td><?= htmlspecialchars($doctor['telefone']); ?></td>
                            <td><?= htmlspecialchars($doctor['email']); ?></td>
                            <td>
                                <button class="edit-button">Editar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">No doctors registered yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div id="edit-modal" class="modal hidden">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <h2 id="modal-title">Editar Médico</h2>
                <form id="edit-form">
                    <input type="hidden" id="doctor-id" name="id">  
                    <input type="hidden" id="doctor-crm" name="crm">
                    <div>
                        <label for="doctor-first-name">Primeiro Nome:</label>
                        <input type="text" id="doctor-first-name" name="nome" required>
                    </div>
                    <div>
                        <label for="doctor-last-name">Sobrenome:</label>
                        <input type="text" id="doctor-last-name" name="sobrenome" required>
                    </div>
                    <div>
                        <label for="doctor-phone">Telefone:</label>
                        <input type="text" id="doctor-phone" name="telefone" required>
                    </div>
                    <div>
                        <label for="doctor-email">Email:</label>
                        <input type="email" id="doctor-email" name="email" required>
                    </div>
                    <button type="submit" class="save-button">Salvar</button>
                </form>
            </div>
        </div>
    </main>
    
    <?php include 'footer.php'; ?>

</body>
</html>