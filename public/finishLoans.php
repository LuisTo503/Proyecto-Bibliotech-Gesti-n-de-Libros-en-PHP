<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Estudiante') {
    header('Location: login.php');
    exit();
}

// Logic to finalize loans, e.g., update database, send confirmation, etc.

header('Location: listBooks.php');
exit();
?>