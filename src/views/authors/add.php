<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Autor</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Autor</h1>
        <form action="../../controllers/AuthorController.php?action=add" method="POST">
            <div class="form-group">
                <label for="name">Nombre del Autor:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit">Agregar Autor</button>
        </form>
        <a href="../../public/index.php">Volver a la página principal</a>
    </div>
</body>
</html>