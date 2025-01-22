<?php
session_start(); // Start the session if not already started

if (!isset($_SESSION['role'])) {
    // Handle the case where the role is not set, e.g., redirect to login
    header('Location: login.php');
    exit();
}

// Include the BookController
require_once '../src/controllers/BookController.php';

// Retrieve the book ID and amount from query parameters
$id = $_GET['id'];
$amount = isset($_GET['amount']) ? (int)$_GET['amount'] : 1; // Default to 1 if not provided

$bookController = new BookController();
$result = $bookController->decreaseBookExistence($id, $amount);

// Redirect or display a success/error message
if ($result === true) {
    header('Location: listBooks.php?message=Decrease successful');
} else {
    header('Location: listBooks.php?message=Error decreasing existence');
}
exit();
