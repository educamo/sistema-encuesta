<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

$tituloPagina = 'Listado de viviendas';

include_once('header.php');
?>
<main>

    <div class="container separacion">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Listado de Viviendas</h2>
            </div>
        </div>

        <div class="row">

            <?Php
            if (!isset($_GET['vivienda'])) { ?>
                <form action="listvivienda.php" method="get">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="vivienda" class="form-label">Tipo de Vivienda</label>
                            </div>
                            <div class="col-lg-6">
                                <select name="vivienda" id="vivienda" class="form-select mi-selector" required>
                                    <option></option>
                                    <option value="casa">Casa</option>
                                    <option value="apartamento">Apartamento</option>
                                    <option value="rancho">Rancho</option>
                                    <option value="hacienda">Hacienda</option>
                                    <option value="cabaña">Cabaña</option>
                                    <option value="anexo">Anexo</option>
                                    <option value="otro">otro</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" value="Ver Viviendas" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            } else {
                $tituloPagina = 'listViviendas';
                $id = $_GET['vivienda'];
                include_once('mostrar.php');

                echo "<h2>Tipo de Vivienda: " . $_GET['vivienda'] . " </h2>";

            ?>
                <div class="col-lg-12 text-end mb-5">
                    <a href="listvivienda.php" class="btn btn-primary offset-lg-6">Atrás</a>
                </div>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12">

                            <?Php

                            $filas = mysqli_num_rows($resultadoVivienda);


                            if ($filas <= 0) {
                                echo "<h2 class='mt-4 p-3 text-black alert alert-warning' role='alert'> No Hay Registros de este Tipo de Vivienda</h2>";
                            } else {
                            ?>
                            <a href="pdfVivienda.php?tipo=<?= $_GET['vivienda'] ?>" class="btn btn-info mb-3" target="_blank"><i class="fa fa-print" title="Imprimir Listado de Viviendas"></i></a>
                                <table class="table table-striped display" id="viviendas">
                                    <thead>
                                        <tr>
                                            <th>N° Vivienda</th>
                                            <th>Calle</th>
                                            <th>Condición</th>
                                            <th>Tipo de Techo</th>
                                            <th>Tipo de Piso</th>
                                            <th>Agua</th>
                                            <th>Luz</th>
                                            <th>Aguas Negras</th>


                                        </tr>
                                    </thead>
                                    <?php

                                    while ($row = mysqli_fetch_array($resultadoVivienda)) {
                                        $id = $row['NoVivienda'];
                                    ?>
                                        <tr>
                                            <td><?= $id ?></td>
                                            <td><?= $row['calle'] ?></td>
                                            <td><?= $row['condicion'] ?></td>
                                            <td><?= $row['tipoTecho'] ?></td>
                                            <td><?= $row['tipoPiso'] ?></td>
                                            <td><?= $row['agua'] ?></td>
                                            <td><?= $row['luz'] ?></td>
                                            <td><?= $row['aguasNegras'] ?></td>

                                        </tr>

                                    <?php
                                    }
                                    mysqli_free_result($resultadoVivienda);

                                    ?>
                                </table>
                            <?Php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            <?php

                mysqli_close($conexion);
            }
            ?>
        </div>
    </div>
</main>

<script type="text/javascript">
    var tablaId = "#viviendas";

</script>


<?php include_once('footer.php'); ?>

<script>
    $(document).ready(function() {


        $('.mi-selector').select2({
            placeholder: "Selecciona una persona",
            allowClear: true
        });


    });
</script>