<?php
session_start();

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard</h1>
        <a href="listBooks.php" class="btn btn-primary">List Books</a>
    </div>
</body>
</html>