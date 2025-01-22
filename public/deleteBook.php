<?php
session_start();
if ($_SESSION['role'] !== 'Administrador') {
    header('Location: listBooks.php');
    exit();
}

require_once '../src/controllers/BookController.php';

if (isset($_GET['id'])) {
    $bookController = new BookController();
    $bookController->deleteBook($_GET['id']);
    header('Location: listBooks.php');
    exit();
} else {
    echo "ID de libro no proporcionado.";
}
?>