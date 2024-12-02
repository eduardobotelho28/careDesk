<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/register.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=keyboard_backspace" />
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">

  <title>Register</title>
  <script defer src="../assets/js/register.js"></script>
</head>
<body>
    <header>
        <a class="material-symbols-outlined" href="#">
            keyboard_backspace
        </a>
        <img class="logo" src="../assets/images/logo-caredesk.png" alt="Logo CAREDESK">
    </header>
  <div class="register-container">
    <h1>REGISTER</h1>
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
        <div class="user-type">
            <label>
            <input type="radio" name="user-type" value="doctor" checked>
            Doctor
            </label>
            <label>
            <input type="radio" name="user-type" value="administrator">
            Administrator
            </label>
            <label>
            <input type="radio" name="user-type" value="patient">
            Patient
            </label>
        </div>
        <div class="personal-itens">
            <div class="cpf">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
            </div>
            <div class="phone">
                <label for="phone">Telefone:</label>
                <input type="text" id="phone" placeholder="(00) 00000-0000" required>
            </div>
        </div>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" placeholder="name@example.com" required>
        <div class="password-container">
            <div class="password-create">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="****************" required>
            </div>
            <div class="password-confirm">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="****************" required>
            </div>
        </div>
        <div class="button-container">
            <button type="submit" class="register-btn">Register</button>
        </div>
    </form>
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
                <li><a href="#">Home</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="#">Ajuda</a></li>
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