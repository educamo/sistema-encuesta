<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

$tituloPagina = 'Registro de Gas';

if (!isset($_GET['persona'])) {
    include_once('mostrar.php');
}

include_once('header.php');
?>
<main>

    <div class="container separacion">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Registro de Gas</h2>
            </div>
        </div>

        <div class="row">

            <?Php
            if (!isset($_GET['persona'])) { ?>

                <form action="#" method="get">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-end mb-5">
                                <a href="registrogeneral.php" class="btn btn-primary offset-lg-6">Atrás</a>
                            </div>
                            <div class="col-lg-4">
                                <label for="persona" class="form-label">Persona </label>
                            </div>
                            <div class="col-lg-6">
                                <select name="persona" id="persona" class="form-select mi-selector">
                                    <option></option>
                                    <?php
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        $id = $row['cedula'];
                                        $nom = $row['nombre'];
                                        $apelli = $row['apellido'];
                                    ?>
                                        <option value="<?= $id ?>"><?= $id . " - " . $nom . " " . $apelli ?></option>
                                    <?php
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($conexion);
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" value="Ver Registro de Gas" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            } elseif ($_GET['persona'] == 0) {
            ?>

                <h2 class="text-center p-3 alert alert-warning" role="alert">Debe Seleccionar una persona de la lista</h2>
                <div class="col-lg-12">
                    <a href="gas.php" class="btn btn-primary offset-lg-6">Atrás</a>
                </div>
            <?php
            } else {
                $tituloPagina = 'gas';
                $id = $_GET['persona'];
                include_once('mostrar.php');
                $persona = mysqli_fetch_array($resultadoPersona);
                $nombres = $persona['nombre'] . ', ' . $persona['apellido'];
                echo "<h2>Persona: " . $nombres . " </h2>";

            ?>
                <div class="col-lg-12 text-end">
                    <a href="gas.php" class="btn btn-primary offset-lg-6">Atrás</a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-1">
                            <a href="nuevogas.php?id=<?= $id ?>&new=1" class="btn btn-success" title="Agregar nuevo Registro de Gas"><i class="fa fa-plus"></i> Agregar Registro de Gas</a>
                        </div>
                        <div class="col-lg-6">
                            <a href="pdfGas.php" class="btn btn-info mb-3" title="Imprimir Listado de Gas"><i class="fa fa-print"></i></a>
                        </div>
                        <div class="col-lg-12">

                            <?Php

                            $filas = mysqli_num_rows($resultadogas);


                            if ($filas <= 0) {
                                echo "<h2 class='mt-4 p-3 alert alert-warning' role='alert'>No Hay Registros Asociados a esta persona</h2>";
                            } else {
                            ?>
                                <table class="table table-striped display" id="gas">
                                    <thead>
                                        <tr>
                                            <th>tipo</th>
                                            <th>Cantidad que posee</th>
                                            <th>Requiere Bombona Social</th>
                                            <th>Posee Código</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    while ($row = mysqli_fetch_array($resultadogas)) {
                                        $id = $row['idGas'];
                                        $cedula = $row['cedula'];

                                        if ($row['bombonaSocial'] === '1') {
                                            $bombonaSocial = 'Si';
                                        } else {
                                            $bombonaSocial = 'No';
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $row['tipo'] ?>Kg</td>
                                            <td><?= $row['cantidad'] ?></td>
                                            <td><?= $bombonaSocial ?></td>
                                            <td><?= $row['codigo'] ?></td>
                                            <td>
                                                <a href="editarGas.php?edit=1&tipo=gas&id='<?= $id ?>'&persona=<?= $cedula ?>" class="btn btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger" title="Borrar"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                    <?php
                                    }
                                    mysqli_free_result($resultadogas);

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
    var tablaId = "#gas";

    $('.btn-danger').click(function(e) {
        e.preventDefault();
        //override defaults

        alertify.defaults.glossary.ok = 'Si';
        alertify.defaults.glossary.cancel = 'No';
        alertify.defaults.transition = "zoom";
        alertify.defaults.theme.ok = "btn btn-primary";
        alertify.defaults.theme.cancel = "btn btn-danger";
        alertify.defaults.theme.input = "form-control";
        alertify.confirm('Confirmación', 'Desea Eliminar esta Bombona de Gas?',
            function() {
                window.location.href = "borrar.php?tipo=gas&id='<?= $id ?>'&persona=<?= $cedula ?>&accion=1"
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