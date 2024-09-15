<?php
session_start();
include('db.php');

if ($_SESSION['user_tipo'] !== 'admin') {
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $mensagem = $_POST['mensagem'];

    $sql = "INSERT INTO avisos (titulo, mensagem) VALUES (:titulo, :mensagem)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['titulo' => $titulo, 'mensagem' => $mensagem]);

    echo "Aviso publicado com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administração</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Administração - Publicar Aviso</h2>
    <form action="admin.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>
        <label for="mensagem">Mensagem:</label>
        <textarea id="mensagem" name="mensagem" required></textarea><br>
        <button type="submit">Publicar</button>
    </form>
</body>
</html>
