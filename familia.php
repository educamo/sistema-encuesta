<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

$tituloPagina = 'Registro de familias';

if (!isset($_GET['persona'])) {
    include_once('mostrar.php');
}

include_once('header.php');
?>
<main>

    <div class="container separacion">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Registro de Familias</h2>
            </div>
        </div>

        <div class="row">

            <?Php
            if (!isset($_GET['persona'])) { ?>
                <form action="#" method="get">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="persona" class="form-label">Representante de la Familia</label>
                            </div>
                            <div class="col-lg-6">
                                <select class='form-select mi-selector' name='persona' id="persona">

                                    <option value=''></option>
                                    <?php
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        $id = $row['cedula'];
                                        $nom = $row['nombre'];
                                        $apelli = $row['apellido'];
                                    ?>
                                        <option value="<?= $id ?>"><?= $id .' - '. $nom . " " . $apelli ?></option>
                                    <?php
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($conexion);
                                    ?>


                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" value="Ver Familia " class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            } elseif ($_GET['persona'] == 0) {
            ?>

                <h2 class="text-center p-3 alert alert-warning" role="alert">Debe Seleccionar una persona de la lista</h2>
                <div class="col-lg-12">
                    <a href="familia.php" class="btn btn-primary offset-lg-6">Atrás</a>
                </div>
            <?php
            } else {
                $tituloPagina = 'Familia';
                $id = $_GET['persona'];
                include_once('mostrar.php');
                $persona = mysqli_fetch_array($resultadoPersona);
                $nombres = $persona['nombre'] . ', ' . $persona['apellido'];
                echo "<h2>Representante: " . $nombres . " </h2>";

                $id = $_GET['persona'];

            ?>
                <div class="col-lg-12 text-end">
                    <a href="familia.php" class="btn btn-primary offset-lg-6">Atrás</a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-5">
                           <a href="#" class="btn btn-info" target="_blank"><i class="fa fa-print"></i></a>
                        </div>

                        <div class="col-lg-12">

                            <?Php

                            $filas = mysqli_num_rows($resultadoFamilia);


                            if ($filas <= 0) {
                                echo "<h2 class='mt-4 p-3 text-black alert alert-warning' role='alert'> No Hay Registros Asociados a esta persona</h2>";
                            } else {
                            ?>
                                <table class="table table-striped display" id="familiares">
                                    <thead>
                                        <tr>
                                            <th>Cédula de Identidad</th>
                                            <th>Nombre Completo</th>
                                            <th>Parentesco</th>
                                            <th>Acciones</th>

                                        </tr>
                                    </thead>
                                    <?php

                                    while ($row = mysqli_fetch_array($resultadoFamilia)) {
                                        $cedula = $row['cedula'];
                                    ?>
                                        <tr>
                                            <td><?= $row['cedula'] ?></td>
                                            <td><?= $row['nombre'] . ' ' . $row['apellido'] ?></td>
                                            <td><?= $row['parentesco'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-danger" title="Borrar" data-id="<?= $cedula ?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    mysqli_free_result($resultadoFamilia);

                                    ?>
                                </table>
                            <?Php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            <?php
                mysqli_free_result($resultadoPersona);
                mysqli_close($conexion);
            }
            ?>
        </div>
    </div>
</main>

<script type="text/javascript">

    var tablaId = "#familiares";


    $('.btn-danger').click(function(e) {
        e.preventDefault();

        var cedula = $(this).attr('data-id');
        //override defaults

        alertify.defaults.glossary.ok = 'Si';
        alertify.defaults.glossary.cancel = 'No';
        alertify.defaults.transition = "zoom";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";
        alertify.confirm('Confirmación', 'Desea Eliminar este Familiar?',
            function() {
                window.location.href = "borrar.php?tipo=familia&id=<?= $id ?>&persona="+ cedula +"&accion=1";
            },
            function() {
                alertify.error('Cancelado')
            });
    })
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