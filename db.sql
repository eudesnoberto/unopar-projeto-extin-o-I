-- Criação do banco de dados
CREATE DATABASE comunidade;

-- Seleção do banco de dados
USE comunidade;

-- Tabela para usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('morador', 'administrador') DEFAULT 'morador'
);

-- Tabela para avisos
CREATE TABLE avisos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    criado_por INT,
    FOREIGN KEY (criado_por) REFERENCES usuarios(id)
);

-- Tabela para agendamentos de comprovantes de residência
CREATE TABLE agendamentos_comprovante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    data DATE,
    hora TIME,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Tabela para requisição de espaço comunitário
CREATE TABLE requisicao_espaco (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    data_evento DATE,
    descricao TEXT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
