<?php
// Este archivo contiene la página de confirmación para eliminar un autor.

require_once '../../controllers/AuthorController.php';

$authorController = new AuthorController();

if (isset($_GET['id'])) {
    $authorId = $_GET['id'];
    $author = $authorController->getAuthorById($authorId);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $authorController->deleteAuthor($authorId);
        header('Location: ../authors/search.php?message=Autor eliminado con éxito');
        exit();
    }
} else {
    header('Location: ../authors/search.php?error=ID de autor no proporcionado');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Autor</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Eliminar Autor</h1>
        <p>¿Está seguro de que desea eliminar al autor: <strong><?php echo htmlspecialchars($author['name']); ?></strong>?</p>
        <form method="POST">
            <button type="submit">Eliminar</button>
            <a href="../authors/search.php">Cancelar</a>
        </form>
    </div>
</body>
</html>