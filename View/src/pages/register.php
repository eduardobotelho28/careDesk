<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/register.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/header.css">
  <link rel="stylesheet" href="../assets/css/footer.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=keyboard_backspace" />
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
  <script src="https://kit.fontawesome.com/ae4cf172c7.js" crossorigin="anonymous"></script>
  <title>Register | CareDesk</title>
  <script defer src="../assets/js/register.js"></script>
</head>
<body>
    <header>
        <a class="material-symbols-outlined" href="../../../index.php">
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
        <div class="response-container">
            
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>