<?php
require_once '../../../Models/PatientModel.php';

$patientModel = new PatientModel();
$patients = $patientModel->getAllPatients();
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
    <title>Patient | CareDesk</title>
    <script src="../assets/js/header.js" defer></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="container">
        <h1>Pacientes Registrados</h1>
        <div class="action-buttons">
            <a href="register-patient.php" class="add-button">Adicionar Novo Paciente</a>
        </div>
        <table class="patient-table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>CPF</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($patients)) : ?>
                    <?php foreach ($patients as $patient) : ?>
                        <tr>
                            <td><?= htmlspecialchars($patient['nome']); ?></td>
                            <td><?= htmlspecialchars($patient['sobrenome']); ?></td>
                            <td><?= htmlspecialchars($patient['cpf']); ?></td>
                            <td><?= htmlspecialchars($patient['telefone']); ?></td>
                            <td><?= htmlspecialchars($patient['email']); ?></td>
                            <td>
                            <button 
                                class="edit-button">
                                Editar
                            </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Nenhum paciente registrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <?php include 'footer.php'; ?>

</body>
</html>