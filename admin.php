<?php
include 'db.php';
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $mensagem = $_POST['mensagem'];

    $stmt = $pdo->prepare("INSERT INTO avisos (titulo, mensagem) VALUES (?, ?)");
    $stmt->execute([$titulo, $mensagem]);

    header('Location: admin.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Área Administrativa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Área Administrativa</h2>
    <a href="logout.php">Sair</a>

    <h3>Publicar Novo Aviso</h3>
    <form method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>
        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" required></textarea><br>
        <input type="submit" value="Publicar Aviso">
    </form>
</body>
</html>
