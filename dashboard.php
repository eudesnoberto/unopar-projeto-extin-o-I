<?php
include 'db.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$id_usuario = $_SESSION['usuario_id'];

// Fetch alerts
$stmt = $pdo->query("SELECT * FROM avisos ORDER BY data DESC");
$avisos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Painel do Usuário</h2>
    <a href="logout.php">Sair</a>
    <h3>Avisos</h3>
    <?php foreach ($avisos as $aviso): ?>
        <div class="aviso">
            <h4><?php echo htmlspecialchars($aviso['titulo']); ?></h4>
            <p><?php echo htmlspecialchars($aviso['mensagem']); ?></p>
            <small><?php echo htmlspecialchars($aviso['data']); ?></small>
        </div>
    <?php endforeach; ?>
    
    <h3>Agendamento de Comprovante de Residência</h3>
    <form method="post" action="agendar_comprovante.php">
        <label for="data_comprovante">Data:</label>
        <input type="date" id="data_comprovante" name="data_comprovante" required><br>
        <input type="submit" value="Agendar">
    </form>

    <h3>Requisição de Espaço Comunitário</h3>
    <form method="post" action="requisitar_espaco.php">
        <label for="data_evento">Data do Evento:</label>
        <input type="date" id="data_evento" name="data_evento" required><br>
        <label for="descricao_evento">Descrição:</label>
        <textarea id="descricao_evento" name="descricao_evento" required></textarea><br>
        <input type="submit" value="Requisitar Espaço">
    </form>
</body>
</html>
