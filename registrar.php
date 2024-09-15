<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nome' => $nome, 'email' => $email, 'senha' => $senha]);

    echo "Cadastro realizado com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastro de Moradores</h2>
    <form action="register.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
