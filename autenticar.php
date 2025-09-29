<?php
session_start();

require_once("logica/Persona.php");
require_once("logica/Admin.php");
require_once("logica/Cliente.php");

$_SESSION["rol"] = "otro";

if (isset($_POST["autenticar"])) {
    $correo = trim($_POST["correo"]);
    $clave  = trim($_POST["clave"]);

    if (!empty($correo) && !empty($clave)) {
        $admin = new Admin("", "", "", $correo, $clave);

        if ($admin->autenticar()) {
            $_SESSION["id"]  = $admin->getId();
            $_SESSION["rol"] = "admin";
            $_SESSION["nombre"] = $admin->getNombre();
            $_SESSION["apellido"] = $admin->getApellido();
            header("Location: sesionAdmin.php");
            exit();
        }

        $cliente = new Cliente("", "", "", $correo, $clave);
        if ($cliente->autenticar()) {
            $_SESSION["id"]  = $cliente->getId();
            $_SESSION["rol"] = "cliente";
            $_SESSION["nombre"] = $cliente->getNombre();
            $_SESSION["apellido"] = $cliente->getApellido();            
            header("Location: sesionCliente.php");
            exit();
        }

        $error = "Error de autenticación, no se encuentra el usuario";
    } else {
        $error = "Por favor ingrese su correo y contraseña.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cocina Etilica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="img/logo.jpg" alt="Logo" width="40" height="40" class="me-2">
                Cocina Etilica
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Categorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                </ul>
                <a href="autenticar.php" class="btn btn-outline-secondary ms-3">
                    <i class="fa-solid fa-user me-1"></i> Iniciar Sesión
                </a>
            </div>
        </div>
    </nav>

    <div class="d-flex align-items-center justify-content-center min-vh-100" style="padding-top: 70px;">
        <div class="card shadow-lg border-0 rounded-3" style="width: 100%; max-width: 400px;">
            <div class="card-header bg-secondary text-white text-center">
                <h3 class="mb-0">Autenticar</h3>
            </div>
            <div class="card-body p-4">
                <?php
                if (isset($_POST["registrar"])) {
                    echo "<div class='alert alert-success' role='alert'>
                        Cliente almacenado
                    </div>";
                }
                if (isset($error)) {
                    echo "<div class='alert alert-danger' role='alert'>"
                        . htmlspecialchars($error) .
                        "</div>";
                }
                ?>
                <form method="post" action="autenticar.php">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="correo" placeholder="Correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="clave" placeholder="Contraseña" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-secondary" name="autenticar">
                            <i class="fa-solid fa-right-to-bracket me-1"></i> Ingresar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
