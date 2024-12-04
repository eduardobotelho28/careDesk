-- Criando o banco de dados
CREATE DATABASE IF NOT EXISTS caredesk;
USE caredesk;

-- Tabela de Usuários
CREATE TABLE users (
    idUsers INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL
);

-- Tabela de Médicos
CREATE TABLE medicos (
    idMedicos INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    crm VARCHAR(100) UNIQUE NOT NULL,
    especialidade VARCHAR(100) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL
);

-- Tabela de Agenda
CREATE TABLE agenda (
    idAgenda INT AUTO_INCREMENT PRIMARY KEY,
    dataHora DATETIME NOT NULL,
    disponibilidade BOOLEAN NOT NULL DEFAULT TRUE,
    medicos_idMedicos INT NOT NULL,
    FOREIGN KEY (medicos_idMedicos) REFERENCES medicos(idMedicos) ON DELETE CASCADE
);

-- Tabela de Pacientes
CREATE TABLE pacientes (
    idPaciente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    historico TEXT,
    telefone VARCHAR(11) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL
);

-- Tabela de Consultas
CREATE TABLE consultas (
    idConsultas INT AUTO_INCREMENT PRIMARY KEY,
    dataHora DATETIME NOT NULL,
    status ENUM('Confirmada', 'Cancelada') NOT NULL,
    pacientes_idPaciente INT NOT NULL,
    medicos_idMedicos INT NOT NULL,
    users_idUsers INT NOT NULL,
    FOREIGN KEY (pacientes_idPaciente) REFERENCES pacientes(idPaciente) ON DELETE CASCADE,
    FOREIGN KEY (medicos_idMedicos) REFERENCES medicos(idMedicos) ON DELETE CASCADE,
    FOREIGN KEY (users_idUsers) REFERENCES users(idUsers) ON DELETE CASCADE
);


-- Inserindo dados na tabela de Usuários
INSERT INTO users (nome, email, senha, cpf) VALUES
('Admin1', 'admin1@clinica.com', 'senha123', '11111111111'),
('Admin2', 'admin2@clinica.com', 'senha123', '22222222222'),
('Admin3', 'admin3@clinica.com', 'senha123', '33333333333'),
('Admin4', 'admin4@clinica.com', 'senha123', '44444444444'),
('Admin5', 'admin5@clinica.com', 'senha123', '55555555555');

-- Inserindo dados na tabela de Médicos
INSERT INTO medicos (nome, email, crm, especialidade, telefone, cpf) VALUES
('Dr. João Silva', 'joao@clinica.com', '12345', 'Cardiologia', '99999999999', '66666666666'),
('Dr. Ana Clara', 'ana@clinica.com', '54321', 'Dermatologia', '98888888888', '77777777777'),
('Dr. Pedro Costa', 'pedro@clinica.com', '67890', 'Ortopedia', '97777777777', '88888888888'),
('Dr. Maria Souza', 'maria@clinica.com', '09876', 'Pediatria', '96666666666', '99999999999'),
('Dr. Lucas Rocha', 'lucas@clinica.com', '11223', 'Neurologia', '95555555555', '11111111122');

-- Inserindo dados na tabela de Pacientes
INSERT INTO pacientes (nome, email, historico, telefone, cpf) VALUES
('Carlos Almeida', 'carlos@paciente.com', 'Hipertensão', '91111111111', '22222222233'),
('Fernanda Lima', 'fernanda@paciente.com', 'Diabetes', '92222222222', '33333333344'),
('José Oliveira', 'jose@paciente.com', 'Asma', '93333333333', '44444444455'),
('Mariana Castro', 'mariana@paciente.com', 'Alérgica a medicamentos', '94444444444', '55555555566'),
('Tiago Mendes', 'tiago@paciente.com', 'Histórico de fraturas', '95555555555', '66666666677');

-- Inserindo dados na tabela de Agenda
INSERT INTO agenda (dataHora, disponibilidade, medicos_idMedicos) VALUES
('2024-12-05 09:00:00', TRUE, 1),
('2024-12-05 10:00:00', TRUE, 1),
('2024-12-06 09:00:00', TRUE, 2),
('2024-12-06 10:00:00', TRUE, 2),
('2024-12-07 14:00:00', TRUE, 3);

-- Inserindo dados na tabela de Consultas
INSERT INTO consultas (dataHora, status, pacientes_idPaciente, medicos_idMedicos, users_idUsers) VALUES
('2024-12-05 09:00:00', 'Confirmada', 1, 1, 1),
('2024-12-05 10:00:00', 'Cancelada', 2, 1, 1),
('2024-12-06 09:00:00', 'Confirmada', 3, 2, 2),
('2024-12-06 10:00:00', 'Confirmada', 4, 2, 2),
('2024-12-07 14:00:00', 'Confirmada', 5, 3, 3);
