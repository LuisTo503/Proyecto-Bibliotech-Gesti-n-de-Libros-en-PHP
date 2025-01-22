<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
    <title>Editar Libro</title>
</head>
<body>
    <div class="container">
        <h1>Editar Libro</h1>
        <?php
        // Incluir el controlador de libros
        require_once '../../controllers/BookController.php';
        
        // Crear una instancia del controlador
        $bookController = new BookController();
        
        // Obtener el ID del libro a editar
        $bookId = $_GET['id'];
        
        // Obtener la información del libro
        $book = $bookController->getBookById($bookId);
        ?>
        <form action="../../controllers/BookController.php?action=edit" method="POST">
            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" value="<?php echo $book['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="author">Autor:</label>
                <input type="text" id="author" name="author" value="<?php echo $book['author']; ?>" required>
            </div>
            <div class="form-group">
                <label for="category">Categoría:</label>
                <input type="text" id="category" name="category" value="<?php echo $book['category']; ?>" required>
            </div>
            <div class="form-group">
                <label for="year_of_publication">Año de Publicación:</label>
                <input type="number" id="year_of_publication" name="year_of_publication" value="<?php echo $book['year_of_publication']; ?>" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" value="<?php echo $book['isbn']; ?>" required>
            </div>
            <div class="form-group">
                <label for="existence">Existencia:</label>
                <input type="number" id="existence" name="existence" value="<?php echo $book['existence']; ?>" required>
            </div>
            <button type="submit">Actualizar Libro</button>
        </form>
    </div>
</body>
</html>