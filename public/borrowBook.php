<?php
require_once 'header.php';
require_once '../src/controllers/BookController.php';

if ($_SESSION['role'] !== 'Alumno') {
    header('Location: listBooks.php');
    exit();
}

if (!isset($_SESSION['borrowed_books'])) {
    $_SESSION['borrowed_books'] = [];
}

$studentName = $_SESSION['username'];

if (isset($_GET['id'])) {
    $bookController = new BookController();
    $book = $bookController->getBookById($_GET['id']);

    if ($book['existence'] > 0) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (count($_SESSION['borrowed_books']) < 3) {
                $returnDate = $_POST['return_date'];
                $_SESSION['borrowed_books'][] = [
                    'book_title' => $book['book_title'],
                    'author' => $book['author'],
                    'return_date' => $returnDate
                ];
                // Reduce the existence of the book
                $bookController->editBook($book['id'], ['existence' => $book['existence'] - 1]);

                // Debug messages
                error_log("Libro prestado: " . $book['book_title']);
                error_log("Existencia después de prestar: " . ($book['existence'] - 1));
                error_log("Libros prestados: " . count($_SESSION['borrowed_books']));
            } else {
                echo "<div class='container mt-5'>";
                echo "<div class='modal' tabindex='-1' role='dialog' id='limitModal'>";
                echo "<div class='modal-dialog' role='document'>";
                echo "<div class='modal-content'>";
                echo "<div class='modal-header'>";
                echo "<h5 class='modal-title'>Límite Alcanzado</h5>";
                echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                echo "<span aria-hidden='true'>&times;</span>";
                echo "</button>";
                echo "</div>";
                echo "<div class='modal-body'>";
                echo "<p>Has alcanzado el límite de 3 libros prestados.</p>";
                echo "</div>";
                echo "<div class='modal-footer'>";
                echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<script>$('#limitModal').modal('show');</script>";
            }
        }

        // Show the borrowing ticket
        echo "<div class='container mt-5'>";
        echo "<div class='card'>";
        echo "<div class='card-header text-center'>";
        echo "<h2>Ticket de Préstamo</h2>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<p><strong>Estudiante:</strong> $studentName</p>";
        foreach ($_SESSION['borrowed_books'] as $index => $borrowed_book) {
            echo "<p><strong>Libro " . ($index + 1) . ":</strong> {$borrowed_book['book_title']} ({$borrowed_book['author']})</p>";
            echo "<p><strong>Fecha de Devolución:</strong> {$borrowed_book['return_date']}</p>";
        }
        echo "<p><strong>Fecha de Préstamo:</strong> " . date('Y-m-d') . "</p>";
        echo "<p><strong>Libros Prestados:</strong> " . count($_SESSION['borrowed_books']) . "/3</p>";
        echo "</div>";
        echo "</div>";
        echo "<div class='mt-3'>";
        if (count($_SESSION['borrowed_books']) < 3) {
            echo "<a href='listBooks.php' class='btn btn-primary'>Seguir Prestando Libros</a>";
        }
        echo "<a href='listBooks.php' class='btn btn-secondary'>Volver a la Lista de Libros</a>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>Sin existencia.</div></div>";
    }
} else {
    echo "<div class='container mt-5'><div class='alert alert-danger'>ID de libro no proporcionado.</div></div>";
}

require_once 'footer.php';
?>
