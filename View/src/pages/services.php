<?php
    require_once '../../../Models/ServicesModel.php';

    $model = new ServiceModel();
    $services = $model->getAllServices();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=account_circle" />
    <link rel="stylesheet" href="../assets/css/pat_doc_serv.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>Services | CareDesk</title>
    <script src="../assets/js/header.js" defer></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="container">
        <h1>Serviços</h1>
        <div class="action-buttons">
            <a href="register-service.php" class="add-button">Adicione novo Serviço</a>
        </div>

        <table class="service-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= htmlspecialchars($service['idServico']) ?></td>
                        <td><?= htmlspecialchars($service['nome']) ?></td>
                        <td><?= htmlspecialchars($service['preco']) ?></td>
                        <td>
                            <a href="edit-service.php?id=<?= htmlspecialchars($service['idServico']) ?>" class="edit-button">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <?php include 'footer.php'; ?>

</body>
</html>