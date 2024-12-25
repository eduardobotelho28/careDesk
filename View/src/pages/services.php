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
    <script src="../assets/js/modal.js" defer></script>

</head>
<body>
    <?php include 'header.php'; ?>
    <main class="container">
        <h1>Serviços</h1>
        <div class="action-buttons">
            <button id="add-service-button" class="add-button">Adicione novo Serviço</a>
        </div>

        <table class="service-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th class="th-action">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= htmlspecialchars($service['idServico']) ?></td>
                        <td><?= htmlspecialchars($service['nome']) ?></td>
                        <td>R$ <?= number_format($service['preco'], 2, ',', '.') ?></td>
                        <td class ="th-action">
                            <button 
                                class="edit-button" 
                                data-id="<?= htmlspecialchars($service['idServico']) ?>" 
                                data-nome="<?= htmlspecialchars($service['nome']) ?>" 
                                data-preco="<?= htmlspecialchars($service['preco']) ?>">
                                Editar
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <div id="edit-modal" class="modal hidden">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Edit Service</h2>
            <form id="edit-form">
                <input type="hidden" id="service-id">
                <div>
                    <label for="service-name">Name:</label>
                    <input type="text" id="service-name" required>
                </div>
                <div>
                    <label for="service-price">Price:</label>
                    <input type="number" id="service-price" step="0.01" required>
                </div>
                <div class = "button-container">
                    <button type="submit" class="save-button">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div id="notification" class="hidden"></div>
    <?php include 'footer.php'; ?>

</body>
</html>