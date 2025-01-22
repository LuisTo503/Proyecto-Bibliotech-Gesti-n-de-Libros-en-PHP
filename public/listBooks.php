<?php
session_start();

if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'Estudiante' && $_SESSION['role'] !== 'Administrador')) {
    header('Location: login.php');
    exit();
}

require_once '../src/controllers/BookController.php';
require_once '../src/controllers/LoanController.php';

$bookController = new BookController();
$loanController = new LoanController();
$books = $bookController->getAllBooks();

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $books = array_filter($books, function($book) use ($search) {
        return stripos($book['book_title'], $search) !== false ||
               stripos($book['author'], $search) !== false ||
               stripos($book['category'], $search) !== false;
    });
}

$loans = $loanController->getLoansByUserId($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Libros</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1>Lista de Libros</h1>
        <form method="get" class="mb-3">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Buscar por título, autor o categoría" class="form-control">
            <button type="submit" class="btn btn-primary mt-2">Buscar</button>
        </form>
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
                    <tr id="book-<?php echo $book['id']; ?>">
                        <td><?php echo htmlspecialchars($book['book_title']); ?></td>
                        <td><?php echo htmlspecialchars($book['author']); ?></td>
                        <td><?php echo htmlspecialchars($book['category']); ?></td>
                        <td><?php echo htmlspecialchars($book['year_of_publication']); ?></td>
                        <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                        <td class="existence"><?php echo htmlspecialchars($book['existence']); ?></td>
                        <td>
                            <?php if ($book['existence'] > 0 && count($loans) < 3): ?>
                                <button class="btn btn-success btn-sm" onclick="loanBook('<?php echo $book['id']; ?>')">Prestar</button>
                            <?php else: ?>
                                <span class="text-danger">No disponible</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loanModal" tabindex="-1" aria-labelledby="loanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loanModalLabel">Detalles del Préstamo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Usuario: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                    <p>Libros Prestados:</p>
                    <ul id="loanedBooksList">
                        <?php foreach ($loans as $loan): ?>
                        <li><?php echo htmlspecialchars($loan['book_title']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p>Total de Libros Prestados: <span id="borrowedBooksCount"><?php echo count($loans); ?></span></p>
                </div>
                <div class="modal-footer">
                    <?php if (count($loans) < 3): ?>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Continuar</button>
                    <?php else: ?>
                    <button type="button" class="btn btn-success" onclick="finishLoans()">Finalizar Préstamos</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<script>
    function loanBook(bookId) {
        $.post('loanBook.php', { id: bookId }, function(response) {
            if (response.error) {
                alert(response.error);
            } else {
                $('#loanedBooksList').append('<li>' + response.book_title + ' (Fecha de Préstamo: ' + response.loan_date + ', Fecha de Devolución: ' + response.return_date + ')</li>');
                var borrowedBooksCount = $('#loanedBooksList li').length;
                $('#borrowedBooksCount').text(borrowedBooksCount);

                var bookRow = $('#book-' + bookId);
                var existenceCell = bookRow.find('.existence');
                var newExistence = parseInt(existenceCell.text()) - 1;
                existenceCell.text(newExistence);

                if (borrowedBooksCount >= 3) {
                    $('.btn-primary').hide();
                    $('.btn-success').show();
                }
                $('#loanModal').modal('show');
            }
        }, 'json');
    }

    function finishLoans() {
        window.location.href = 'finishLoans.php';
    }
</script>

<?php include 'footer.php'; ?>
</body>
</html>