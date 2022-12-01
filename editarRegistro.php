<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

if ($_GET['edit'] != 1) {
    header("location:registrogeneral.php");
}

$tituloPagina = 'Editar Registro';

include_once('mostrar.php');



include_once('header.php');
?>
<main>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Datos Personales</h2>
            </div>
            <div class col-lg-12>
                <form action="editar.php?tipo=registro" method="post" id="editaroRegistro" class="nuevoRegistro">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="cedula" class="form-label">CEDULA</label>
                                <input type="text" id="cedula" name="cedula" class="form-control" value="<?= $registro['cedula'] ?>" disabled>
                                <input type="hidden" id="id" name="id" class="form-control" value="<?= $registro['cedula'] ?>">
                            </div>
                            <div class="col-lg-4">
                                <label for="Nombre" class="form-label">NOMBRE</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?= $registro['nombre'] ?>">
                            </div>
                            <div class="col-lg-4">
                                <label for="apellido" class="form-label">APELLIDO</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" value="<?= $registro['apellido'] ?>">
                            </div>
                            <div class="col-lg-4">
                                <label for="Sexo" class="form-label">SEXO</label>
                                <select name="sexo" id="sexo" class="form-select">
                                    <option value="masculino" <?php if ($registro['sexo'] == 'masculino') {
                                                                    echo ' selected="selected"';
                                                                } ?>>Masculino</option>
                                    <option value="femenino" <?php if ($registro['sexo'] == 'femenino') {
                                                                    echo ' selected="selected"';
                                                                } ?>>Femenino</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="nacimiento" class="form-label">FECHA NACIMIENTO</label>
                                <input type="date" id="nacimiento" name="nacimiento" class="form-control" value="<?= $registro['nacimiento'] ?>">
                            </div>
                            <div class="col-lg-4">
                                <label for="edoCivil" class="form-label">ESTADO CIVIL</label>
                                <select name="edoCivil" id="edoCivil" class="form-select">
                                    <option value="soltero" <?php if ($registro['edoCivil'] == 'soltero') {
                                                                echo ' selected="selected"';
                                                            } ?>>Soltero</option>
                                    <option value="casado" <?php if ($registro['edoCivil'] == 'casado') {
                                                                echo ' selected="selected"';
                                                            } ?>>Casado</option>
                                    <option value="viudo" <?php if ($registro['edoCivil'] == 'viudo') {
                                                                echo ' selected="selected"';
                                                            } ?>>Viudo</option>
                                    <option value="otro" <?php if ($registro['edoCivil'] == 'otro') {
                                                                echo ' selected="selected"';
                                                            } ?>>Otro</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="telefono" class="form-label">TELEFONO</label>
                                <input type="phone" id="telefono" name="telefono" class="form-control" value="<?= $registro['telefono'] ?>" pattern="[0-9]{9,}">
                            </div>
                            <div class="col-lg-4">
                                <label for="jefeFamilia" class="form-label">JEFE DE FAMILIA</label>
                                <select name="jefeFamilia" id="jefeFamilia" class="form-select">
                                    <option value="0" <?php if ($registro['jefeFamilia'] == '0') {
                                                            echo ' selected="selected"';
                                                        } ?>>No</option>
                                    <option value="1" <?php if ($registro['jefeFamilia'] == '1') {
                                                            echo ' selected="selected"';
                                                        } ?>>Si</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="NoVivienda" class="form-label">Número de la Vivienda</label>
                                <input type="text" id="NoVivienda" name="NoVivienda" class="form-control" value="<?= $registro['NoVivienda'] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <hr />
                                <h2>Datos de la Vivienda</h2>
                                <?Php
                                include_once('editarvivienda.php')
                                ?>
                            </div>
                        </div>
                        <div class="row text-center mt-4">
                            <div class="col-lg-12">
                                <input type="submit" value="Guardar" class="btn btn-success">
                                <a href="editarRegistro.php?edit=0" class="btn btn-primary">Cancelar</a>

                            </div>
                        </div>
                    </div>
                </form>


                <?Php
                mysqli_free_result($resultado);
                mysqli_close($conexion);
                ?>


            </div>
        </div>
</main>


<?php include_once('footer.php'); ?>

<script type="text/javascript">
    $('.btn-primary').click(function() {
        alertify.message('Se Cancelo la Operación');
    });

    jQuery("#telefono").on('input', function(evt) {
        // Allow only numbers.
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    $('#NoVivienda').focusout(function() {
        var NoVivienda = $(this).val();
        var urlajax = "mostrar.php";
        var tituloPagina = 'Nueva Vivienda';

        $.ajax({

            // The URL for the request
            url: urlajax,

            // The data to send (will be converted to a query string)
            data: {
                id: NoVivienda,
                pagina: tituloPagina
            },

            // Whether this is a POST or GET request
            type: "GET",
            beforeSend: function() {
                $('#calle').prop("disabled", "disabled");
                $('#tipoVivienda').prop("disabled", "disabled");
                $('#condicion').prop("disabled", "disabled");
                $('#tipoTecho').prop("disabled", "disabled");
                $('#tipoPiso').prop("disabled", "disabled");
                $('#agua').prop("disabled", "disabled");
                $('#luz').prop("disabled", "disabled");
                $('#aguanegras').prop("disabled", "disabled");
                $('#calle').val('');
                $('#tipoVivienda').val('');
                $('#condicion').val('');
                $('#tipoTecho').val('');
                $('#tipoPiso').val('');
                $('#agua').val('');
                $('#luz').val('');
                $('#aguanegras').val('');
            },
            success: function(r) {
                $('#calle').removeAttr("disabled");
                $('#tipoVivienda').removeAttr("disabled");
                $('#condicion').removeAttr("disabled");
                $('#tipoTecho').removeAttr("disabled");
                $('#tipoPiso').removeAttr("disabled");
                $('#agua').removeAttr("disabled");
                $('#luz').removeAttr("disabled");
                $('#aguanegras').removeAttr("disabled");
                var data = JSON.parse(r);
                datos = data;
                $('#calle').val(datos[1]);
                $('#tipoVivienda').val(datos[2]);
                $('#condicion').val(datos[3]);
                $('#tipoTecho').val(datos[4]);
                $('#tipoPiso').val(datos[5]);
                $('#agua').val(datos[6]);
                $('#luz').val(datos[7]);
                $('#aguanegras').val(datos[8]);

            },
            error: function(r) {

            }
        });



    });
</script>