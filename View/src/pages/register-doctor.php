<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/register.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=keyboard_backspace" />
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
  <script src="https://kit.fontawesome.com/ae4cf172c7.js" crossorigin="anonymous"></script>
  <title>Register Doctor | CareDesk</title>
  <script defer src="../assets/js/register.js"></script>
</head>
<body class="doctor">
    <header>
        <a class="material-symbols-outlined" href="../../../index.php">
            keyboard_backspace
        </a>
        <img class="logo" src="../assets/images/logo-caredesk.png" alt="Logo CAREDESK">
    </header>
    <div class="register-container">
        <h1>REGISTER DOCTOR</h1>
        <form id="register-form">
            <div class="name">
                <div class="first-name">
                    <label for="firstname">First name:</label>
                    <input type="text" id="firstname" name="firstname" placeholder="First name here" required>
                </div>
                <div class="last-name">
                    <label for="lastname">Last name:</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Last name here" required>
                </div>
            </div>
            <div class="personal-itens">
                <div class="cpf">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
                </div>
                <div class="phone">
                    <label for="phone">Telefone:</label>
                    <input type="text" id="phone" placeholder="(00) 00000-0000" required>
                </div>
            </div>
            <div class="box-itens">
                <div class="email">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="name@example.com" required>
                </div>    
                <div class="crm">
                    <label for="crm">CRM:</label>
                    <input type="text" id="crm" placeholder="12345" pattern="[0-9]{4,6}" required>
                </div>
            </div>
            <select id="especialidade" required>
                <option value="" disabled selected>Select a specialty</option>
                <option value="cardiologia">Cardiology</option>
                <option value="pediatria">Pediatrics</option>
                <option value="dermatologia">Dermatology</option>
                <option value="neurologia">Neurology</option>
                <!-- Adicione mais opções conforme necessário -->
            </select>
            <div class="button-container">
                <button type="submit" class="register-btn">Register</button>
            </div>
        </form>
        <div class="response-container">
            
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <h3>Sobre o CareDesk</h3>
                <p>CareDesk é um sistema de gerenciamento de clínicas médicas, projetado para facilitar a organização e o atendimento com tecnologia moderna e acessível.</p>
            </div>
            <div class="footer-links">
                <h3>Links Úteis</h3>
                <ul>
                    <li><a href="../../../index.php">Home</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>Contato</h3>
                <p>Email: contato@caredesk.com</p>
                <p>Telefone: (11) 9999-9999</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 CareDesk. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>