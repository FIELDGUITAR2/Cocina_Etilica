<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <?php
    if ($rol == "admin") {
        ?>
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
                        <li class="nav-item"><a class="nav-link" href="#">Editar añadir productos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Proveedores</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Pqr's</a></li>
                    </ul>
                    <a href="CerrarSesion.php" class="btn btn-outline-secondary ms-3">
                        <i class="fa-solid fa-user me-1"></i> Cerrar Sesión
                    </a>
                </div>
            </div>
        </nav>

        <?php
    } else if ($rol == "cliente") {
        ?>

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
                            <li class="nav-item"><a class="nav-link" href="#">Tienda</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Tu carrito</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Mis compras</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Notificaciones</a></li>
                        </ul>
                        <a href="CerrarSesion.php" class="btn btn-outline-secondary ms-3">
                            <i class="fa-solid fa-user me-1"></i> Cerrar Sesión
                        </a>
                    </div>
                </div>
            </nav>

        <?php
    }
    ?>