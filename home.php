<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

$usuario = $_SESSION['nombreUsuario'];

$tituloPagina = 'Página de inicio';

include_once('header.php');

?>

<main>

    <div class="container">
        <div class="row">
            <h1 class="col-lg-12 mt-5 text-primary h1 display-1 text-center">Bienvenido</h1>
            <h2 class="col-lg-12 text-center text-primary"><?= $usuario ?></h2>
            <h3 class="col-lg-12 text-center">a la comunidad “Brisas de carvenca”</h3>
            <br />


        </div>
</main>


<?php include_once('footer.php'); ?>