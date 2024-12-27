<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/register.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
  <title>Register Doctor | CareDesk</title>
  <script defer src="../assets/js/header.js"></script>
  <script defer src="../assets/js/register-doctor.js"></script>

</head>
<body class="doctor">
    <?php include 'header.php'; ?>
    <div class="register">
        <a class="material-symbols-outlined" href="doctor.php">
            <img src="../assets/images/keyboard_backspace.png" alt="Voltar">
        </a>
    </div>
    <div class="register-container">
        <h1>REGISTER DOCTOR</h1>
        <form id="register-form">
            <div class="name">
                <div class="first-name">
                    <label for="firstname">First name:</label>
                    <input type="text" id="firstname" name="nome" placeholder="First name here" required>
                </div>
                <div class="last-name">
                    <label for="lastname">Last name:</label>
                    <input type="text" id="lastname" name="sobrenome" placeholder="Last name here" required>
                </div>
            </div>
            <div class="personal-itens">
                <div class="cpf">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
                </div>
                <div class="phone">
                    <label for="phone">Telefone:</label>
                    <input type="text" id="phone" placeholder="(00) 00000-0000" required name="telefone">
                </div>
            </div>
            <div class="box-itens">
                <div class="email">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="name@example.com" required>
                </div>    
                <div class="crm">
                    <label for="crm">CRM:</label>
                    <input type="text" id="crm" placeholder="12345" pattern="[0-9]{4,6}" required name="crm">
                </div>
            </div>
            <select id="especialidade" name="especialidade" required>
                <option value="" disabled selected>Carregando especialidades...</option>
            </select>
            <div class="button-container">
                <button type="submit" class="register-btn">Register</button>
            </div>
        </form>
        <div class="response-container">
            
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>