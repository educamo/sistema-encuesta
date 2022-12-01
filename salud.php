<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

$tituloPagina = 'Listado por Patología';


include_once('header.php');
?>
<main>

    <div class="container separacion">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Listado por Patologías</h2>
            </div>
        </div>

        <div class="row">

            <?Php
            if (!isset($_GET['patologia'])) { ?>
                <form action="salud.php" method="get">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="patologia" class="form-label">patologia </label>
                            </div>
                            <div class="col-lg-6">
                                <select name="patologia" id="patologia" class="form-select mi-selector" required>
                                    <option></option>
                                    <option value="Diabetes">Diabetes</option>
                                    <option value="Hipertensión">Hipertensión</option>
                                    <option value="Asma">Asma</option>
                                    <option value="Cancer">Cancer</option>
                                    <option value="Sinusitis">Sinusitis</option>
                                    <option value="Tensión Ocular">Tensión Ocular</option>
                                    <option value="Autismo">Autismo</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" value="Ver" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            } else {
                $tituloPagina = 'Patologias';
                $id = $_GET['patologia'];
                include_once('mostrar.php');

            ?>
                <div class="col-lg-12 text-end">
                    <a href="salud.php" class="btn btn-primary offset-lg-6">Atrás</a>
                </div>
                <?Php
                $nombrePatologia = $_GET['patologia'];
                ?>
                <h2><?= $nombrePatologia ?></h2>
                <div class="container">
                    <div class="row">
                        <?Php

                        $filas = mysqli_num_rows($resultadopatologia);


                        if ($filas <= 0) { ?>
                            <div class="col-lg-12">

                            <?php
                            echo "<h2 class='mt-4 p-3 text-black alert alert-warning' role='alert'> No Hay Personas con esta Patología</h2>";
                        } else {
                            ?>
                                <div class="col-lg-8 mb-5">
                                    <a href="pdfPatologia.php?patologia=<?=$nombrePatologia?>" class="btn btn-info" title="Imprimir listado por Patologías" target="_blanck"><i class="fa fa-print"></i></a>
                                </div>
                                <table class="table table-striped display" id="listPatologia">
                                    <thead>
                                        <tr>
                                            <th>Cédula</th>
                                            <th>Nombre Persona</th>
                                            <th>medicamento</th>
                                            <th>embarazada</th>
                                            <th>discapacidad</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    while ($row = mysqli_fetch_array($resultadopatologia)) {
                                        $nombres = $row['nombre'] . ' ' . $row['apellido'];
                                        $cedula = $row['cedula'];
                                    ?>
                                        <tr>
                                            <td><?= $cedula ?></td>
                                            <td><?= $nombres ?></td>
                                            <td><?= $row['medicamentos'] ?></td>
                                            <td><?= $row['embarazadas'] ?></td>
                                            <td><?= $row['discapacidad'] ?></td>
                                        </tr>

                                    <?php
                                    }
                                    mysqli_free_result($resultadopatologia);

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
    var tablaId = "#listPatologia";
</script>


<?php include_once('footer.php'); ?>

<script>
    $(document).ready(function() {


        $('.mi-selector').select2({
            placeholder: "Selecciona una Patología",
            allowClear: true
        });


    });
</script>