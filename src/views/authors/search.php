<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Autores</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Búsqueda de Autores</h1>
        <form action="../../controllers/AuthorController.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre del Autor:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <div id="resultados">
            <!-- Aquí se mostrarán los resultados de la búsqueda -->
        </div>
    </div>
    <script src="../public/js/scripts.js"></script>
    <script src="../pulic/js/bootstrap.min.js"></script>
</body>
</html>