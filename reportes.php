<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

$tituloPagina = 'Reportes';

if (!isset($_GET['persona'])) {
    include_once('mostrar.php');
}


include_once('header.php');
?>
<main class="container separacion">

    <div class="container">
        <div class="row">
            <h1 class="text-center col-lg-12">Listado de PDF's</h1>
        </div>
        <div class="row">
            <ol>
                <li><a target="_blank" href="pdfVivienda.php"> <span class="lista">Viviendas </span></a></li>
                <li><a target="_blank" href="pdfSalud.php"> <span class="lista">Salud por Persona </span></a></li>
                <li><a target="_blank" href="pdfGas.php"> <span class="lista">Personas con Gas </span></a></li>
            </ol>
        </div>
    </div>
</main>


<?php include_once('footer.php'); ?>