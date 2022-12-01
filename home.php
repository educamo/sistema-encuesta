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
            <div class="col-lg-4 text-star">
                <ul style="list-style: none;">
                    <li class="mb-1"> <a href="https://www.comunas.gob.ve/fundacomunal/" target="_blank"><img src="assets/image/fundacomunal.jpeg" alt="Funda Comunal" class="img-responsive img-thumbnail" style="width:30%;"></a></a></li>
                    <li class="mb-1"> <a href="https://www.patria.org.ve/" target="_blank"><img src="assets/image/patria_login_id.png" alt="Sistema Patria" class="img-responsive img-thumbnail" style="width:30%;"></a></li>
                    <li class="mb-1"> <a href="http://www.minhvi.gob.ve" target="_blank"><img src="assets/image/misionvivienda.png" alt="Mision Vivienda" class="img-responsive img-thumbnail" style="width:30%;"></a></li>
                    <li class="mb-1"> <a href="http://www.psuv.org.ve/" target="_blank"><img src="assets/image/psuv.png" alt="PSUV" class="img-responsive img-thumbnail" style="width:30%;"></a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <img src="assets/image/foto1.jpg" alt="foto 1" class="img-responsive img-thumbnail img-fluid">
            </div>
        </div>
</main>


<?php include_once('footer.php'); ?>