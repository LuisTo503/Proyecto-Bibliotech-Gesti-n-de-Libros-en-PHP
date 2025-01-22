<?php
session_start(); // Inicio de sesion

require_once 'header.php';

// Archivo de entrada para la aplicación de gestión de biblioteca

// Incluir archivos de clases y controladores
require_once '../src/classes/Book.php';
require_once '../src/classes/Author.php';
require_once '../src/classes/Category.php';
require_once '../src/classes/Library.php';
require_once '../src/controllers/BookController.php';
require_once '../src/classes/CategoryModel.php';
require_once '../src/controllers/AuthorController.php';
require_once '../src/controllers/CategoryController.php';

// Inicializar controladores
$bookController = new BookController();
$authorController = new AuthorController();
$categoryController = new CategoryController();

// Manejar las solicitudes
$requestMethod = $_SERVER['REQUEST_METHOD'];
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Rutas para las acciones
switch ($action) {
    case 'addBook':
        $bookController->addBook($_POST); // Pass data from POST
        break;
    case 'editBook':
        $bookController->editBook($_GET['id'], $_POST); // Pass ID and data
        break;
    case 'deleteBook':
        $bookController->deleteBook($_GET['id']); // Pass ID
        break;
    case 'searchBook':
        $bookController->searchBooks($_GET['searchTerm']); // Pass search term
        break;
    case 'addAuthor':
        $authorController->addAuthor($_POST); // Pass data from POST
        break;
    case 'editAuthor':
        $authorController->editAuthor($_GET['id'], $_POST); // Pass ID and data
        break;
    case 'deleteAuthor':
        $authorController->deleteAuthor($_GET['id']); // Pass ID
        break;
    case 'searchAuthor':
        $authorController->searchAuthor($_GET['searchTerm']); // Pass search term
        break;
    case 'addCategory':
        $categoryController->addCategory($_POST); // Pass data from POST
        break;
    case 'editCategory':
        $categoryController->editCategory($_GET['id'], $_POST); // Pass ID and data
        break;
    case 'deleteCategory':
        $categoryController->deleteCategory($_GET['id']); // Pass ID
        break;
    case 'searchCategory':
        $categoryController->searchCategory($_GET['searchTerm']); // Pass search term
        break;
    case 'loginAdmin':
        header('Location: loginAdmin.php');
        exit();
    case 'loginStudent':
        header('Location: loginStudent.php');
        exit();
    default:
        // Mostrar la página principal con la imagen Hero y el menú de inicio de sesión
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">';
        echo '<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">';
        echo '<style>
                .hero-image {
                    background-image: url("../public/img/hero-image.jpg");
                    background-size: cover;
                    background-position: center;
                    height: 500px;
                    position: relative;
                }
                .hero-text {
                    text-align: center;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    color: white;
                }
              </style>';
        echo '<div class="hero-image">';
        echo '  <div class="hero-text">';
        echo '    <h1 class="display-4">Bienvenido al Sistema de Gestión de Biblioteca</h1>';
        echo '    <p class="lead">Gestiona tus libros, autores y categorías de manera eficiente.</p>';
        echo '    <hr class="my-4">';
        echo '    <p>Inicia sesión como Administrador o Alumno para continuar.</p>';
        echo '    <a class="btn btn-primary btn-lg" href="?action=loginAdmin" role="button">Administrador</a>';
        echo '    <a class="btn btn-secondary btn-lg" href="?action=loginStudent" role="button">Alumno</a>';
        echo '  </div>';
        echo '</div>';
        break;
}

require_once 'footer.php';
