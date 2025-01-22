<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Administrador') {
    header('Location: loginAdmin.php');
    exit();
}

require_once '../src/controllers/BookController.php';
require_once '../src/controllers/LoanController.php';

$bookController = new BookController();
$loanController = new LoanController();
$books = $bookController->getAllBooks();
$loans = $loanController->getAllLoans();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración de Libros</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1>Administración de Libros</h1>
        <a href="addBook.php" class="btn btn-primary mb-3">Agregar Libro</a>
        <h2>Libros en Préstamo</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Título del Libro</th>
                    <th>Fecha de Préstamo</th>
                    <th>Fecha de Devolución</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($loans as $loan): ?>
                    <?php
                    $book = $bookController->getBookById($loan['book_id']);
                    $username = 'Usuario ' . $loan['user_id']; // reemplace con el nombre de usuario
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($username); ?></td>
                        <td><?php echo htmlspecialchars($book['book_title']); ?></td>
                        <td><?php echo htmlspecialchars($loan['loan_date']); ?></td>
                        <td><?php echo htmlspecialchars($loan['return_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Lista de Libros</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Categoría</th>
                    <th>Año de Publicación</th>
                    <th>ISBN</th>
                    <th>Existencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['book_title']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?></td>
                        <td><?php echo htmlspecialchars($book['category']); ?></td>
                        <td><?php echo htmlspecialchars($book['year_of_publication']); ?></td>
                        <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                        <td><?php echo htmlspecialchars($book['existence']); ?></td>
                        <td>
                            <a href="editBook.php?id=<?php echo $book['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="deleteBook.php?id=<?php echo $book['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>