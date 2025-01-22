<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Administrador') {
    header('Location: loginAdmin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Admin Dashboard</h1>
        <a href="listBooks.php" class="btn btn-primary">List Books</a>
        <!-- Add other admin functionalities here -->
    </div>
</body>
</html>