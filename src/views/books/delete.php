<?php
// Este archivo contiene la página de confirmación para eliminar un libro.

require_once '../../controllers/BookController.php';

$bookController = new BookController();

if (isset($_GET['id'])) {
    $bookId = $_GET['id'];
    $book = $bookController->getBookById($bookId);

    if ($book) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookController->deleteBook($bookId);
            header('Location: ../books/search.php?message=Libro eliminado con éxito');
            exit;
        }
    } else {
        echo "Libro no encontrado.";
        exit;
    }
} else {
    echo "ID de libro no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Libro</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Eliminar Libro</h1>
        <p>¿Está seguro de que desea eliminar el libro "<?php echo htmlspecialchars($book['title']); ?>"?</p>
        <form method="POST">
            <button type="submit">Eliminar</button>
            <a href="../books/search.php">Cancelar</a>
        </form>
    </div>
</body>
</html>