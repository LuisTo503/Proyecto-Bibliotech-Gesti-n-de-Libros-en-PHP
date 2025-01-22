<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Editar Categoría</h1>
        <form action="../../controllers/CategoryController.php?action=edit" method="POST">
            <input type="hidden" name="id" value="<?php echo $categoria->id; ?>">
            <div class="form-group">
                <label for="nombre">Nombre de la Categoría:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $categoria->nombre; ?>" required>
            </div>
            <button type="submit">Actualizar Categoría</button>
        </form>
        <a href="search.php">Volver a buscar categorías</a>
    </div>
</body>
</html>