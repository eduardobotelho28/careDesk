<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/register.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/main_pages.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
  <title>Registrar consultas | CareDesk</title>
  <script defer src="../assets/js/header.js"></script>
  <script defer src="../assets/js/register-agenda.js"></script>

</head>
<body class="agenda">
    <?php include 'header.php'; ?>
    <div class="register">
        <a class="material-symbols-outlined" href="consultations.php">
            <img src="../assets/images/keyboard_backspace.png" alt="Voltar">
        </a>
    </div>
    <div class="register-container">
        <h1>REGISTRAR CONSULTA</h1>
        <form id="register-form">
            <div class="box_1">
                <div class="dataHora">
                    <label for="dataHora">Data e Hora:</label>
                    <input type="datetime-local" id="consulta-data-Hora" name="dataHora" placeholder="Dia e horário" required>
                </div>
                <div class="status">
                    <label for="status">Status:</label>
                    <input type="text" id="consulta-status" name="status" placeholder="Agendada/Concluída/Cancelada" required>
                </div>
            </div>
            <div class="box_2">
                <div class="paciente_nome">
                    <label for="paciente_nome">Nome do paciente:</label>
                    <input type="text" id="consulta-paciente_nome" name="paciente_nome" placeholder="Nome do paciente" required>
                </div>
                <div class="medico_nome">
                    <label for="medico_nome">Nome do médico:</label>
                    <input type="text" id="consulta-medico_nome" placeholder="Nome do médico" name="medico_nome" required >
                </div>
            </div>
            <div class="button-container">
                <button type="submit" class="register-btn">Registrar</button>
            </div>
        </form>
        <div class="response-container">
            
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>