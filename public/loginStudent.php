<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read credentials from pass.txt
    $credentials = file_get_contents(__DIR__ . '/../pass.txt');
    preg_match("/Alumno: '(.+)' y Pass: '(.+)'/", $credentials, $matches);

    $storedUsername = $matches[1];
    $storedPassword = $matches[2];

    // Validate credentials
    if ($username === $storedUsername && $password === $storedPassword) {
        $_SESSION['role'] = 'Estudiante';
        $_SESSION['user_id'] = 1; // Set the user ID accordingly
        $_SESSION['username'] = $username; // Store the username in the session
        header('Location: listBooks.php');
        exit();
    } else {
        $error = 'Invalid credentials';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login Estudiante</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Login Estudiante</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" placeholder="student" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="student123" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>

</html>