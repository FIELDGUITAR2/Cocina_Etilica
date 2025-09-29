<?php
session_start();
$rol = $_SESSION["rol"];
include("Extremos/Cabeza.php");
?>

<div class="container" style="padding-top: 80px;">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Bienvenido</h5>
            <p class="card-text">
                <?php
                echo $_SESSION["nombre"] . " " . $_SESSION["apellido"];
                ?>
            </p>
        </div>
    </div>
</div>

<?php
include("Extremos/Pie.php");
?>