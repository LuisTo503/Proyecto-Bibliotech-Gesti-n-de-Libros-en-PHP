<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read credentials from pass.txt (assuming admin credentials are stored similarly)
    $credentials = file_get_contents(__DIR__ . '/../pass.txt');
    preg_match("/Administrador: '(.+)' y Pass: '(.+)'/", $credentials, $matches);

    if (isset($matches[1]) && isset($matches[2])) {
        $storedUsername = $matches[1];
        $storedPassword = $matches[2];

        // Validate credentials
        if ($username === $storedUsername && $password === $storedPassword) {
            $_SESSION['role'] = 'Administrador';
            $_SESSION['user_id'] = 1; // Set the user ID accordingly
            $_SESSION['username'] = $username; // Store the username in the session
            header('Location: adminBooks.php');
            exit();
        } else {
            $error = 'Invalid credentials';
        }
    } else {
        $error = 'Credentials not found';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Administrador</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center">Inicio de Sesión - Administrador</h2>
                <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form action="loginAdmin.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="username" placeholder="admin" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="admin123" name="password" required>
                    </div>
                    <input type="hidden" name="role" value="admin">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>