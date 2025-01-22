<?php
// Archivo: /library-management-system/library-management-system/src/views/authors/edit.php

// Incluir el controlador de autores
require_once '../../controllers/AuthorController.php';

// Crear una instancia del controlador de autores
$authorController = new AuthorController();

// Verificar si se ha enviado el ID del autor a editar
if (isset($_GET['id'])) {
    $authorId = $_GET['id'];
    $author = $authorController->getAuthorById($authorId);
} else {
    // Redirigir si no se proporciona un ID
    header('Location: search.php');
    exit();
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authorName = $_POST['name'];
    $authorController->editAuthor($authorId, $authorName);
    header('Location: search.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Editar Autor</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Nombre del Autor:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($author['name']); ?>" required>
            </div>
            <button type="submit">Actualizar Autor</button>
        </form>
        <a href="search.php">Volver a la búsqueda</a>
    </div>
</body>
</html>