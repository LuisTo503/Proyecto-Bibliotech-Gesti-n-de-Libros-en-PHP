<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Administrador') {
    header('Location: loginAdmin.php');
    exit();
}

require_once '../src/controllers/BookController.php';

$bookController = new BookController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'id' => uniqid(),
        'book_title' => $_POST['book_title'],
        'author' => $_POST['author'],
        'category' => $_POST['category'],
        'year_of_publication' => $_POST['year_of_publication'],
        'isbn' => $_POST['isbn'],
        'existence' => $_POST['existence']
    ];
    $result = $bookController->addBook($data);
    header('Location: adminBooks.php?message=' . urlencode($result));
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Libro</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1>Agregar Libro</h1>
        <form action="addBook.php" method="post">
            <div class="mb-3">
                <label for="book_title" class="form-label">Título</label>
                <input type="text" class="form-control" id="book_title" name="book_title" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autor</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Categoría</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="mb-3">
                <label for="year_of_publication" class="form-label">Año de Publicación</label>
                <input type="number" class="form-control" id="year_of_publication" name="year_of_publication" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>
            <div class="mb-3">
                <label for="existence" class="form-label">Existencia</label>
                <input type="number" class="form-control" id="existence" name="existence" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Libro</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>