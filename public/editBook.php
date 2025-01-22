<?php
session_start();
if ($_SESSION['role'] !== 'Administrador') {
    header('Location: listBooks.php');
    exit();
}

require_once '../src/controllers/BookController.php';

$bookController = new BookController();
$book = $bookController->getBookById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'book_title' => $_POST['book_title'],
        'author' => $_POST['author'],
        'category' => $_POST['category'],
        'year_of_publication' => $_POST['year_of_publication'],
        'isbn' => $_POST['isbn'],
        'existence' => intval($_POST['existence'])
    ];
    $bookController->editBook($_GET['id'], $data);
    header('Location: adminBooks.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Libro</h2>
        <form action="editBook.php?id=<?php echo $book['id']; ?>" method="post">
            <div class="mb-3">
                <label for="book_title" class="form-label">Título</label>
                <input type="text" class="form-control" id="book_title" name="book_title" value="<?php echo htmlspecialchars($book['book_title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autor</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo htmlspecialchars($book['author']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Categoría</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($book['category']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="year_of_publication" class="form-label">Año de Publicación</label>
                <input type="number" class="form-control" id="year_of_publication" name="year_of_publication" value="<?php echo htmlspecialchars($book['year_of_publication']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo htmlspecialchars($book['isbn']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="existence" class="form-label">Existencia</label>
                <input type="number" class="form-control" id="existence" name="existence" value="<?php echo htmlspecialchars($book['existence']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>