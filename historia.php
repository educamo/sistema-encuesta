<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

$usuario = $_SESSION['nombreUsuario'];

$tituloPagina = 'Reseña Histórica';

include_once('header.php');

?>


    <main>

        <div class="container">
            <div class="row">
                <h2 class="col-lg-12 text-center mt-5">Reseña Histórica</h2>
                <hr />
                <br />
                <h3 class="text-center"></h3>
                <p class="col-lg-6 text-justify">
                    En los inicios la comunidad se llamaba sector El Milán de la carretera principal Rubio - el Corozo
                    el cual se distribuía según el censo sanitario en ocho parcelas que pertenencia a las familias: Barrera,
                    García Acevedo, Álvarez, Leal, Mendoza Rincón, Clavijo, Prospero Villamizar y Hidalgo. Luego se presenta
                    la empresa CARBONES DE VENEZUELA y compro la hacienda La Ahumada la cual delimitaba con las parcelas antes
                    mencionadas. La empresa creo los hornos para el procesamiento del carbón mineral dando inicio sus operaciones
                    desde 1980 hasta el año 1991.Luego 2004 los terrenos de Carvenca entraron en venta a partir del año 2009
                    aproximadamente y eso dio inicio a la construcción de nuevas viviendas propias y de interés social lo que ha
                    originado que la comunidad se encuentre desarrollándose urbanísticamente y a su vez creciendo su población.</p>
                <p class="col-lg-6 text-justify">
                    Actualmente la comunidad es conocida como CARVENCA y cuenta con 53 viviendas y parcelas agrícolas. En ella se
                    desarrolla el sector agropecuario y agrícola así como también funciona Asociación Cooperativa Bloque Soberano,
                    bodegas y el templo cristiano SHALOM.
                    <img src="assets/image/bandera.jpg" alt="Bandera" style="width: 60%; height: 50%; border:solid; margin:10px;">
                </p>

                <hr />
                <br />
                <h3 class="col-lg-12">Ubicación de la comunidad</h3>
                <p>
                    La comunidad está ubicada en el Municipio Junín, aldea Unión, Parroquia La Petrolea en la vía
                    principal Rubio- La petrolea.
                </p>

                <div class="col-lg-4 offset-lg-4 img-responsive mb-5">
                    <img src="assets/image/mapa-comunidad.png" alt="Mapa de la comunidad Carvenca" class="croquis">
                </div>
            </div>

        </div>
    </main class="mb-5">


        <?php include_once('footer.php'); ?>

