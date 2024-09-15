<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['user_name']; ?></h1>
    <a href="logout.php">Logout</a>
    <!-- Adicione links para outras páginas aqui -->
</body>
</html>
