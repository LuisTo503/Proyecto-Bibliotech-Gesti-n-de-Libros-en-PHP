<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Categoría</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Agregar Nueva Categoría</h1>
        <form action="../../controllers/CategoryController.php?action=add" method="POST">
            <div class="form-group">
                <label for="name">Nombre de la Categoría:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit">Agregar Categoría</button>
        </form>
        <a href="../../public/index.php">Volver al inicio</a>
    </div>
</body>
</html>