<?php
// Este archivo contiene la página de confirmación para eliminar una categoría.

require_once '../../controllers/CategoryController.php';

$categoryController = new CategoryController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = $categoryController->getCategoryById($id);
    
    if (!$category) {
        echo "Categoría no encontrada.";
        exit;
    }
} else {
    echo "ID de categoría no proporcionado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryController->deleteCategory($id);
    header('Location: ../categories/search.php?message=Categoría eliminada con éxito');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
    <title>Eliminar Categoría</title>
</head>
<body>
    <div class="container">
        <h1>Eliminar Categoría</h1>
        <p>¿Está seguro de que desea eliminar la categoría "<?php echo htmlspecialchars($category['name']); ?>"?</p>
        <form method="POST">
            <button type="submit">Eliminar</button>
            <a href="../categories/search.php">Cancelar</a>
        </form>
    </div>
</body>
</html>