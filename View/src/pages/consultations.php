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
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="container">
        <h1>Consultas Agendadas</h1>
        <div class="action-buttons">
            <a href="" class="add-button">Adicionar Nova Consulta</a>
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
                            <td><?= htmlspecialchars(date('d/m/Y H:i', strtotime($consulta['dataHora']))); ?></td>
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
    </main>
    <?php include 'footer.php'; ?>

</body>
</html>