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
    <link rel="stylesheet" href="../assets/css/pat_doc_serv.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" />
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>Doctor | CareDesk</title>
    <script src="../assets/js/header.js" defer></script>
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
                        <tr>
                            <td><?= htmlspecialchars($doctor['crm']); ?></td>
                            <td><?= htmlspecialchars($doctor['nome']); ?></td>
                            <td><?= htmlspecialchars($doctor['sobrenome']); ?></td>
                            <td><?= htmlspecialchars($doctor['telefone']); ?></td>
                            <td><?= htmlspecialchars($doctor['email']); ?></td>
                            <td>
                                <a href="edit-doctor.php?id=<?= $doctor['idMedicos']; ?>" class="edit-button">Editar</a>
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
    </main>
    <?php include 'footer.php'; ?>

</body>
</html>