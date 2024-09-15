<?php
include 'db.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data_comprovante = $_POST['data_comprovante'];
    $usuario_id = $_SESSION['usuario_id'];

    $stmt = $pdo->prepare("INSERT INTO agendamentos_comprovantes (usuario_id, data_comprovante) VALUES (?, ?)");
    $stmt->execute([$usuario_id, $data_comprovante]);

    header('Location: dashboard.php');
}
?>
