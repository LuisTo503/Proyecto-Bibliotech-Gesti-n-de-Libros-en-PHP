<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Categorías</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Búsqueda de Categorías</h1>
        <form action="" method="GET">
            <div class="form-group">
                <label for="nombre_categoria">Nombre de la Categoría:</label>
                <input type="text" id="nombre_categoria" name="nombre_categoria" class="form-control" placeholder="Ingrese el nombre de la categoría" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <?php
        // Aquí se procesaría la búsqueda y se mostrarían los resultados
        if (isset($_GET['nombre_categoria'])) {
            $nombre_categoria = $_GET['nombre_categoria'];
            // Lógica para buscar la categoría en el sistema
            // Ejemplo: $categorias = $categoryController->buscarCategoria($nombre_categoria);
            // Mostrar resultados
        }
        ?>
    </div>
</body>
</html>