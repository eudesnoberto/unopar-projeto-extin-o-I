Sistema de Comunicação da Associação de Moradores

Este projeto é um sistema básico de comunicação para uma associação de moradores, desenvolvido com PHP, MySQL, JavaScript e CSS. O sistema permite o cadastro de moradores, login, visualização de avisos e uma área administrativa para o presidente do bairro publicar avisos para a comunidade.

Funcionalidades
Cadastro de Moradores: Moradores podem se cadastrar com seu nome, e-mail e senha.
Login: O sistema possui autenticação de usuários (morador e admin).
Visualização de Avisos: Os moradores podem visualizar os avisos publicados.
Área Administrativa: O presidente do bairro (admin) pode publicar novos avisos para a comunidade.
Avisos em Tempo Real: Todos os avisos ficam disponíveis em uma área pública para os moradores cadastrados.

Tecnologias Utilizadas
Backend: PHP 7+
Banco de Dados: MySQL
Frontend: HTML, CSS, JavaScript
Estilo: CSS básico
Autenticação: Senhas criptografadas usando password_hash()

Requisitos
PHP 7.0 ou superior
MySQL 5.7 ou superior
Servidor Web (Apache, Nginx, etc.)
Navegador para acessar a aplicação

Instalação
Clone o repositório:
git clone https://github.com/eudesnoberto/unopar-projeto-extin-o-I.git

Crie o banco de dados MySQL:

Acesse o MySQL e execute o seguinte script para criar o banco de dados e as tabelas:

CREATE DATABASE associacao;
USE associacao;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    tipo ENUM('morador', 'admin') DEFAULT 'morador'
);

CREATE TABLE avisos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    mensagem TEXT NOT NULL,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Configuração de Conexão com o Banco de Dados:

No arquivo db.php, configure as credenciais de acesso ao banco de dados:

$host = 'localhost';
$db = 'associacao';
$user = 'root';
$pass = '';

Inicie o Servidor Web:
Se estiver usando o PHP built-in server, execute o seguinte comando na raiz do projeto:
php -S localhost:8000
Acesse o sistema em http://localhost:8000.

Criar um usuário administrador (presidente do bairro):

Após instalar o sistema, você pode inserir manualmente um usuário administrador na tabela usuarios com o tipo admin.

Exemplo de SQL para criar o administrador:
INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('Presidente', 'admin@exemplo.com', MD5('senha123'), 'admin');

Como Usar
Cadastro: Moradores podem se cadastrar na página de cadastro com seu nome, e-mail e senha.
Login: Use suas credenciais para acessar o painel.
Painel do Morador: Visualize os avisos da comunidade.
Administração: O presidente do bairro (admin) pode publicar novos avisos na área administrativa.
Estrutura do Projeto
db.php: Arquivo de configuração do banco de dados.
register.php: Página de cadastro de novos moradores.
login.php: Página de login para moradores e admin.
dashboard.php: Painel do usuário, onde os avisos são exibidos.
admin.php: Página de administração onde o presidente do bairro pode publicar avisos.
style.css: Arquivo de estilo para a interface do sistema.
Melhorias Futuras
Implementar envio de notificações por e-mail.
Adicionar funcionalidades de upload de arquivos (como atas de reuniões).
Melhorar a interface gráfica com frameworks como Bootstrap.
Adicionar relatórios de uso para administradores.
Contribuição
Sinta-se à vontade para enviar pull requests ou sugerir melhorias. Toda ajuda é bem-vinda!

Licença
Este projeto está sob a licença MIT. Sinta-se à vontade para utilizá-lo e modificá-lo de acordo com suas necessidades.
