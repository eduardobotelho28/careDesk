<header>
        <div class="logo-header">
            <a href="home.php">
                <img src="../assets/images/logo-caredesk-white.png" alt="CareDesk Logo" href="home.php">
            </a>
        </div>
        <nav>
            <ul class="menu">
                <li>
                    <a href="home.php">Início</a>
                </li>
                <li>
                    <a>Cadastro</a>
                    <ul class="dropdown">
                        <li><a href="doctor.php">Médicos</a></li>
                        <li><a href="patient.php">Pacientes</a></li>
                    </ul>
                </li>
                <li><a href="consultations.php">Consultas</a></li>
                <li><a href="services.php">Serviços</a></li>
            </ul>
        </nav>
        <div class="user-area">
            <div class="user-itens">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
                <p>Usuário</p>
            </div>
            <button id="expand-button">▼</button>
            <div id="user-menu" class="dropdown hidden">
                <a href="#">Log Out</a>
            </div>
        </div>
</header>
