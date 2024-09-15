<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM avisos ORDER BY data DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$avisos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Bem-vindo ao Painel da Associação</h2>

    <h3>Avisos:</h3>
    <?php foreach ($avisos as $aviso): ?>
        <div class="aviso">
            <h4><?php echo htmlspecialchars($aviso['titulo']); ?></h4>
            <p><?php echo htmlspecialchars($aviso['mensagem']); ?></p>
            <small><?php echo $aviso['data']; ?></small>
        </div>
    <?php endforeach; ?>

    <?php if ($_SESSION['user_tipo'] === 'admin'): ?>
        <a href="admin.php">Administração</a>
    <?php endif; ?>
</body>
</html>
