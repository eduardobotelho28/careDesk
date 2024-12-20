-- Criando o banco de dados
CREATE DATABASE IF NOT EXISTS caredesk;
USE caredesk;

-- Dropando tabelas existentes
DROP TABLE IF EXISTS consultas;
DROP TABLE IF EXISTS agenda;
DROP TABLE IF EXISTS pacientes;
DROP TABLE IF EXISTS medicos;
DROP TABLE IF EXISTS users;

-- Tabela de Usuários
CREATE TABLE users (
    idUsers INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(15) NOT NULL
);

-- Tabela de Médicos
CREATE TABLE medicos (
    idMedicos INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    crm VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    cpf VARCHAR(11) NOT NULL
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
    sobrenome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    historico TEXT,
    telefone VARCHAR(11) NOT NULL,
    cpf VARCHAR(11) NOT NULL
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
INSERT INTO users (idUsers, nome, sobrenome, email, telefone, senha, cpf) VALUES
(1, 'Eduardo', 'Botelho', 'admin1@clinica.com', '99999999999', 'senha123', '11111111111'),
(2, 'Bruno', 'Batista', 'admin2@clinica.com', '99999999999', 'senha123', '22222222222');

-- Inserindo dados na tabela de Médicos
INSERT INTO medicos (idMedicos, nome, sobrenome, email, crm, especialidade, telefone, cpf) VALUES
(1, 'Dr. João', 'Silva', 'joao@clinica.com', '12345', 'Cardiologia', '99999999999', '66666666666'),
(2, 'Dr. Ana Clara', 'Pereira', 'ana@clinica.com', '54321', 'Dermatologia', '98888888888', '77777777777'),
(3, 'Dr. Pedro', 'Costa', 'pedro@clinica.com', '67890', 'Ortopedia', '97777777777', '88888888888'),
(4, 'Dr. Maria', 'Souza', 'maria@clinica.com', '09876', 'Pediatria', '96666666666', '99999999999'),
(5, 'Dr. Lucas', 'Rocha', 'lucas@clinica.com', '11223', 'Neurologia', '95555555555', '11111111122');

-- Inserindo dados na tabela de Pacientes
INSERT INTO pacientes (idPaciente, nome, sobrenome, email, historico, telefone, cpf) VALUES
(1, 'Carlos', 'Almeida', 'carlos@paciente.com', 'Hipertensão', '91111111111', '22222222233'),
(2, 'Fernanda', 'Lima', 'fernanda@paciente.com', 'Diabetes', '92222222222', '33333333344'),
(3, 'José', 'Oliveira', 'jose@paciente.com', 'Asma', '93333333333', '44444444455'),
(4, 'Mariana', 'Castro', 'mariana@paciente.com', 'Alérgica a medicamentos', '94444444444', '55555555566'),
(5, 'Tiago', 'Mendes', 'tiago@paciente.com', 'Histórico de fraturas', '95555555555', '66666666677');

-- Inserindo dados na tabela de Agenda
INSERT INTO agenda (idAgenda, dataHora, disponibilidade, medicos_idMedicos) VALUES
(1, '2024-12-05 09:00:00', TRUE, 1),
(2, '2024-12-05 10:00:00', TRUE, 1),
(3, '2024-12-06 09:00:00', TRUE, 2),
(4, '2024-12-06 10:00:00', TRUE, 2),
(5, '2024-12-07 14:00:00', TRUE, 3);

-- Inserindo dados na tabela de Consultas
INSERT INTO consultas (idConsultas, dataHora, status, pacientes_idPaciente, medicos_idMedicos, users_idUsers) VALUES
(1, '2024-12-05 09:00:00', 'Confirmada', 1, 1, 1),
(2, '2024-12-05 10:00:00', 'Cancelada', 2, 1, 1),
(3, '2024-12-06 09:00:00', 'Confirmada', 3, 2, 2),
(4, '2024-12-06 10:00:00', 'Confirmada', 4, 2, 2),
(5, '2024-12-07 14:00:00', 'Confirmada', 5, 3, 2);

-- Adicionando tabela de Especialidades
CREATE TABLE especialidades (
    idEspecialidade INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

-- Atualizando a tabela de Médicos para relacionamento com Especialidades (muitos-para-muitos)
CREATE TABLE medicos_especialidades (
    medicos_idMedicos INT NOT NULL,
    especialidades_idEspecialidade INT NOT NULL,
    PRIMARY KEY (medicos_idMedicos, especialidades_idEspecialidade),
    FOREIGN KEY (medicos_idMedicos) REFERENCES medicos(idMedicos) ON DELETE CASCADE,
    FOREIGN KEY (especialidades_idEspecialidade) REFERENCES especialidades(idEspecialidade) ON DELETE CASCADE
);

-- Adicionando tabela de Serviços
CREATE TABLE servicos (
    idServico INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

-- Atualizando a tabela de Consultas para relacionamento com Serviços (muitos-para-muitos)
CREATE TABLE consultas_servicos (
    consultas_idConsultas INT NOT NULL,
    servicos_idServico INT NOT NULL,
    PRIMARY KEY (consultas_idConsultas, servicos_idServico),
    FOREIGN KEY (consultas_idConsultas) REFERENCES consultas(idConsultas) ON DELETE CASCADE,
    FOREIGN KEY (servicos_idServico) REFERENCES servicos(idServico) ON DELETE CASCADE
);

-- Inserindo dados na tabela de Especialidades
INSERT INTO especialidades (idEspecialidade, nome) VALUES
(1, 'Cardiologia'),
(2, 'Dermatologia'),
(3, 'Ortopedia'),
(4, 'Pediatria'),
(5, 'Neurologia');

-- Associando Médicos a Especialidades
INSERT INTO medicos_especialidades (medicos_idMedicos, especialidades_idEspecialidade) VALUES
(1, 1), -- Dr. João -> Cardiologia
(2, 2), -- Dr. Ana Clara -> Dermatologia
(3, 3), -- Dr. Pedro -> Ortopedia
(4, 4), -- Dr. Maria -> Pediatria
(5, 5), -- Dr. Lucas -> Neurologia
(5, 3); -- Dr. Lucas também -> Ortopedia

-- Inserindo dados na tabela de Serviços
INSERT INTO servicos (idServico, nome, preco) VALUES
(1, 'Consulta Simples', 150.00),
(2, 'Exame de Sangue', 80.00),
(3, 'Raio-X', 200.00),
(4, 'Consulta Pediátrica', 180.00),
(5, 'Ressonância Magnética', 500.00);

-- Associando Consultas a Serviços
INSERT INTO consultas_servicos (consultas_idConsultas, servicos_idServico) VALUES
(1, 1), -- Consulta 1 -> Consulta Simples
(1, 2), -- Consulta 1 -> Exame de Sangue
(2, 3), -- Consulta 2 -> Raio-X
(3, 1), -- Consulta 3 -> Consulta Simples
(4, 4), -- Consulta 4 -> Consulta Pediátrica
(5, 5); -- Consulta 5 -> Ressonância Magnética
