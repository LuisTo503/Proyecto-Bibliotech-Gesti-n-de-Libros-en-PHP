<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if (($role === 'admin' && $password === 'admin123') || ($role === 'student' && $password === 'student123')) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role === 'admin' ? 'Administrador' : 'Alumno';
    header('Location: dashboard.php');
    exit();
} else {
    echo "Credenciales incorrectas. Por favor, inténtelo de nuevo.";
}
?>
