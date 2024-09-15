CREATE DATABASE associacao;

USE associacao;

-- Tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    tipo ENUM('morador', 'admin') DEFAULT 'morador'  -- O admin será o presidente
);

-- Tabela de notificações/avisos
CREATE TABLE avisos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    mensagem TEXT NOT NULL,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
