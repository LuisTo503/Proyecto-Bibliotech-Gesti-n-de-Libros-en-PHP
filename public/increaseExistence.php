<?php
session_start(); // Iniciar la sesión si aún no se ha iniciado.

if (!isset($_SESSION['role'])) {
    // Gestionar el caso en el que no se ha establecido el rol, p. ej., redirigir al inicio de sesión
    header('Location: login.php');
    exit();
}

// Include the BookController
require_once '../src/controllers/BookController.php';

// Recuperar el ID y el importe del libro a partir de los parámetros de consulta
$id = $_GET['id'];
$amount = isset($_GET['amount']) ? (int)$_GET['amount'] : 1; // Valor predeterminado 1 si no se proporciona

$bookController = new BookController();
$result = $bookController->increaseBookExistence($id, $amount);

// Redireccionar o mostrar un mensaje de éxito/error
if ($result) {
    header('Location: adminBooks.php?message=Increase successful');
} else {
    header('Location: adminBooks.php?message=Error increasing existence');
}
exit();