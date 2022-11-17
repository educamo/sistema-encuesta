<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

$tituloPagina = 'Registro de Medicina';

if (!isset($_GET['persona'])) {
    include_once('mostrar.php');
}

include_once('header.php');
?>
<main>

    <div class="container separacion">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Registro de Salud</h2>
            </div>
        </div>

        <div class="row">

            <?Php
            if (!isset($_GET['persona'])) { ?>
                <form action="#" method="get">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="persona" class="form-label">Persona </label>
                            </div>
                            <div class="col-lg-6">
                                <select name="persona" id="persona" class="form-select">
                                    <option value="0">Seleccione una opción</option>
                                    <?php
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        $id = $row['cedula'];
                                        $nom = $row['nombre'];
                                        $apelli = $row['apellido'];
                                    ?>
                                        <option value="<?= $id ?>"><?= $nom . " " . $apelli ?></option>
                                    <?php
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($conexion);
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" value="Ver Registro de Salud" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            } elseif ($_GET['persona'] == 0) {
            ?>

                <h2 class="text-center p-3 alert alert-warning" role="alert">Debe Seleccionar una persona de la lista</h2>
                <div class="col-lg-12">
                    <a href="medicina.php" class="btn btn-primary offset-lg-6">Atras</a>
                </div>
            <?php
            } else {
                $tituloPagina = 'Medicinas';
                $id = $_GET['persona'];
                include_once('mostrar.php');
                $persona = mysqli_fetch_array($resultadoPersona);
                $nombres = $persona['nombre'] . ', ' . $persona['apellido'];
                echo "<h2>Persona: " . $nombres . " </h2>";

            ?>
                <div class="col-lg-12 text-end">
                    <a href="medicina.php" class="btn btn-primary offset-lg-6">Atrás</a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-5">
                            <a href="nuevaMedicina.php?id=<?= $id ?>&new=1" class="btn btn-success" title="Agregar nuevo Registro de Salud"><i class="fa fa-plus"></i> Agregar Registro de Salud</a>
                        </div>
                        <div class="col-lg-12">

                            <?Php

                            $filas = mysqli_num_rows($resultadoMedicina);


                            if ($filas <= 0) {
                                echo "<h2 class='mt-4 p-3 text-black alert alert-warning' role='alert'> No Hay Registros Asociados a esta persona</h2>";
                            } else {
                            ?>
                                <table class="table table-striped display" id="medicinas">
                                    <thead>
                                        <tr>
                                            <th>Medicamentos Requeridos</th>
                                            <th>patologías que sufre</th>
                                            <th>embarazada</th>
                                            <th>discapacidad</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    while ($row = mysqli_fetch_array($resultadoMedicina)) {
                                        $id = $row['idMedicinas'];
                                        $cedula = $row['cedula'];
                                    ?>
                                        <tr>
                                            <td><?= $row['medicamentos'] ?></td>
                                            <td><?= $row['patologias'] ?></td>
                                            <td><?= $row['embarazadas'] ?></td>
                                            <td><?= $row['discapacidad'] ?></td>
                                            <td>
                                                <a href="editarMedicinas.php?edit=1&tipo=Medicina&id='<?= $id ?>'&persona=<?= $cedula ?>" class="btn btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" title="Borrar"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    mysqli_free_result($resultadoMedicina);

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
    $(document).ready(function() {
        $('#medicinas').DataTable();
    });

    $('.btn-danger').click(function(e) {
        e.preventDefault();
        //override defaults

        alertify.defaults.glossary.ok = 'Si';
        alertify.defaults.glossary.cancel = 'No';
        alertify.defaults.transition = "zoom";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";
        alertify.confirm('Confirmación', 'Desea Eliminar el Registro de Salud?',
            function() {
                window.location.href = "borrar.php?tipo=Medicina&id='<?= $id ?>'&persona=<?= $cedula ?>'&accion=1"
            },
            function() {
                alertify.error('Cancelado')
            });
    })
</script>


<?php include_once('footer.php'); ?>