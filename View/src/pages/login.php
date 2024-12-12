<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Caredesk</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <script src="https://kit.fontawesome.com/ae4cf172c7.js" crossorigin="anonymous"></script>
    <script defer src="../assets/js/login.js"></script>

</head>
<body>
    <div class="grid-container">
        <div class="apresentantion-container">
            <div class="content">
                <h1 class="title">CAREDESK</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
        </div>
        <div class="login-container">
            <img class="logo" src="../assets/images/logo-caredesk - greenDark.png" alt="Logo CAREDESK">
            <form id="login-form">
                <h1>LOG IN</h1>
                <input type="text" placeholder="CPF" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
                <div class="password-input">
                    <input type="password" placeholder="Password" name="password" id="password">
                    <i class="fa-regular fa-eye-slash" id="togglePassword"></i>               
                </div>
                
                <button type="submit">Log in</button>
            </form>
            <div class="links-container">
                    <!--<a href="">Forgot your password?</a> -->
                    <p>
                        Don't have an account? 
                        <a href="register.php">Sign up</a>
                    </p>
                </div>
        </div>
    </div>
</body>
</html>