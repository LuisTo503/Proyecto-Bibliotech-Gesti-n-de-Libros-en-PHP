<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Libros</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Buscar Libros</h1>
        <form action="../../controllers/BookController.php?action=search" method="POST">
            <div class="form-group">
                <label for="searchTitle">Título:</label>
                <input type="text" id="searchTitle" name="title" class="form-control" placeholder="Ingrese el título del libro">
            </div>
            <div class="form-group">
                <label for="searchAuthor">Autor:</label>
                <input type="text" id="searchAuthor" name="author" class="form-control" placeholder="Ingrese el nombre del autor">
            </div>
            <div class="form-group">
                <label for="searchCategory">Categoría:</label>
                <input type="text" id="searchCategory" name="category" class="form-control" placeholder="Ingrese la categoría del libro">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
</body>
</html>