<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Estudiante') {
    header('Location: login.php');
    exit();
}

require_once '../src/controllers/BookController.php';
require_once '../src/controllers/LoanController.php';

$bookController = new BookController();
$loanController = new LoanController();

$bookId = $_POST['id'];
$book = $bookController->getBookById($bookId);
$loans = $loanController->getLoansByUserId($_SESSION['user_id']);

if (count($loans) >= 3) {
    echo json_encode(['error' => 'No puedes prestar más de 3 libros.']);
    exit();
}

if ($book && $book['existence'] > 0) {
    $loanController->loanBook($_SESSION['user_id'], $bookId);
    $loan_date = date('Y-m-d');
    $return_date = date('Y-m-d', strtotime('+14 days'));
    echo json_encode(['book_title' => $book['book_title'], 'loan_date' => $loan_date, 'return_date' => $return_date]);
} else {
    echo json_encode(['error' => 'El libro no está disponible.']);
}
?>