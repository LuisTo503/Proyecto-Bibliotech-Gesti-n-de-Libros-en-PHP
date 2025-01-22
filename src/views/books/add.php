<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Libro</h1>
        <form action="../../controllers/BookController.php?action=add" method="POST">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Autor:</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="category">Categoría:</label>
                <input type="text" id="category" name="category" required>
            </div>
            <div class="form-group">
                <label for="year_of_publication">Año de Publicación:</label>
                <input type="number" id="year_of_publication" name="year_of_publication" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" id="isbn" name="isbn" required>
            </div>
            <div class="form-group">
                <label for="existence">Existencia:</label>
                <input type="number" id="existence" name="existence" required>
            </div>
            <button type="submit">Agregar Libro</button>
        </form>
    </div>
</body>
</html>