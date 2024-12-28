<?php
require_once __DIR__ . '/../../../Models/ConsultationModel.php';

$ConsultationModel = new ConsultationModel();
$consultas = $ConsultationModel->getConsultations(); // Mudança aqui para manter a consistência
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
    <title>Consultations | CareDesk</title>
    <script src="../assets/js/header.js" defer></script>
    <script src="../assets/js/modal-agenda.js" defer></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="container"> 
        <h1>Consultas Agendadas</h1>
        <div class="action-buttons">
            <a href="register-agenda" class="add-button">Adicionar Nova Consulta</a>
        </div>
        <table class="consultations-table">
            <thead>
                <tr>
                    <th>ID da Consulta</th>
                    <th>Data e Hora</th>
                    <th>Status</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($consultas)) : ?>
                    <?php foreach ($consultas as $consulta) : ?>
                        <tr data-id="<?= htmlspecialchars($consulta['idConsultas']); ?>">
                            <td><?= htmlspecialchars($consulta['idConsultas']); ?></td>
                            <td><?= htmlspecialchars(date('Y-m-d H:i:s', strtotime($consulta['dataHora']))); ?></td>
                            <td><?= htmlspecialchars($consulta['status']); ?></td>
                            <td><?= htmlspecialchars($consulta['paciente_nome']); ?></td>
                            <td><?= htmlspecialchars($consulta['medico_nome']); ?></td>
                            <td>
                                <button class="edit-button" data-id="<?= htmlspecialchars($consulta['idConsultas']) ?>">Editar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Nenhuma consulta registrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div id="edit-modal" class="modal hidden">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <h2 id="modal-title">Editar registro de consulta</h2>
                <form id="edit-form">
                    <input type="hidden" id="consulta-id" name="id">
                    <div>
                        <label for="consulta-dataHora">Data e Hora da consulta:</label>
                        <input type="datetime-local" id="consulta-dataHora" name="dataHora" required>
                    </div>
                    <div>
                        <label for="consulta-status">Status da consulta:</label>
                        <input type="text" id="consulta-status" name="status" required>
                    </div>
                    <div>
                        <label for="consulta-paciente_nome">Nome do paciente:</label>
                        <input type="text" id="consulta-paciente_nome" name="paciente_nome" required>
                    </div>
                    <div>
                        <label for="consulta-medico_nome">Nome do médico:</label>
                        <input type="text" id="consulta-medico_nome" name="medico_nome" required>
                    </div>
                    <button type="submit" class="save-button">Salvar</button>
                </form>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>

</body>
</html>
