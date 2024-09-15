<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    $tipo = 'morador'; // Default type

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $email, $senha, $tipo]);

    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <input type="submit" value="Cadastrar">
    </form>
    <a href="login.php">Já tem uma conta? Faça login</a>
</body>
</html>
