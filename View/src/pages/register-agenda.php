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
        <?php
        // Conexão com o banco de dados
        require_once __DIR__ . '/../../../config/database.php';
        
        // Crie a conexão
        $pdo = new Database();
        
        // Consultar médicos
        $medicos_query = $pdo->query("SELECT idMedicos, CONCAT(nome, ' ', sobrenome) AS nomeCompleto FROM medicos");
        $medicos = $medicos_query->fetchAll();
        
        // Consultar pacientes
        $pacientes_query = $pdo->query("SELECT idPaciente, CONCAT(nome, ' ', sobrenome) AS nomeCompleto FROM pacientes");
        $pacientes = $pacientes_query->fetchAll();
        
        // Consultar serviços
        $servicos_query = $pdo->query("SELECT idServico, nome FROM servicos");
        $servicos = $servicos_query->fetchAll();
        ?>
        <form id="register-form">
            <div class="box_1">
                <div class="dataHora">
                    <label for="dataHora">Data e Hora:</label>
                    <input type="datetime-local" id="consulta-data-Hora" name="dataHora" required>
                </div>
                <div class="status">
                    <label for="status">Status:</label>
                    <select id="consulta-status" name="status" required>
                        <option value="Confirmada">Confirmada</option>
                        <option value="Cancelada">Cancelada</option>
                    </select>
                </div>
            </div>
            <div class="box_2">
                <div class="paciente_nome">
                    <label for="paciente_id">Paciente:</label>
                    <select id="consulta-paciente_id" name="paciente_id" required>
                        <option value="" disabled selected>Selecione um paciente</option>
                        <?php foreach ($pacientes as $paciente): ?>
                            <option value="<?= $paciente['idPaciente']; ?>"><?= htmlspecialchars($paciente['nomeCompleto']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="medico_nome">
                    <label for="medico_id">Médico:</label>
                    <select id="consulta-medico_id" name="medico_id" required>
                        <option value="" disabled selected>Selecione um médico</option>
                        <?php foreach ($medicos as $medico): ?>
                            <option value="<?= $medico['idMedicos']; ?>"><?= htmlspecialchars($medico['nomeCompleto']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="box_3">
                <div class="servico_nome">
                    <label for="servico_id">Serviço:</label>
                    <select id="consulta-servico_id" name="servico_id" required>
                        <option value="" disabled selected>Selecione um serviço</option>
                        <?php foreach ($servicos as $servico): ?>
                            <option value="<?= $servico['idServico']; ?>"><?= htmlspecialchars($servico['nome']); ?></option>
                        <?php endforeach; ?>
                    </select>
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