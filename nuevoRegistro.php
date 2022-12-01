<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

if ($_GET['new'] != 1) {
    header("location:registrogeneral.php");
}

$tituloPagina = 'Nuevo Registro';


include_once('header.php');
?>
<main>

    <div class="container">
        <div class="row">

            <div class col-lg-12>
                <form action="guardar.php?tipo=registro" method="post" id="nuevoRegistro" class="nuevoRegistro">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Datos Personales</h2>
                            </div>
                            <div class="col-lg-4">
                                <label for="cedula" class="form-label">CEDULA</label>
                                <input type="text" id="cedula" name="cedula" class="form-control" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="Nombre" class="form-label">NOMBRE</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="apellido" class="form-label">APELLIDO</label>
                                <input type="text" id="apellido" name="apellido" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="Sexo" class="form-label">SEXO</label>
                                <select name="sexo" id="sexo" class="form-select">
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="nacimiento" class="form-label">FECHA NACIMIENTO</label>
                                <input type="date" id="nacimiento" name="nacimiento" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="edoCivil" class="form-label">ESTADO CIVIL</label>
                                <select name="edoCivil" id="edoCivil" class="form-select">
                                    <option value="soltero">Soltero</option>
                                    <option value="casado">Casado</option>
                                    <option value="viudo">Viudo</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="telefono" class="form-label">TELEFONO</label>
                                <input type="tel" id="telefono" name="telefono" class="form-control" pattern="[0-9]{9, }">
                            </div>
                            <div class="col-lg-4">
                                <label for="jefeFamilia" class="form-label">JEFE DE FAMILIA</label>
                                <select name="jefeFamilia" id="jefeFamilia" class="form-select">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-lg-12" id="nucleoF">

                            </div>
                            <div class="col-lg-12" id="campos">

                            </div>
                            <div class="col-lg-12">
                                <hr />
                                <h2>Datos de Vivienda</h2>
                                <?Php
                                include_once('nuevaVivienda.php');
                                ?>
                            </div>
                        </div>
                        <div class="row text-center mt-4">
                            <div class="col-lg-12">
                                <input type="submit" value="Guardar" class="btn btn-success">
                                <a href="nuevoRegistro.php?new=0" class="btn btn-primary">Cancelar</a>

                            </div>
                        </div>
                    </div>
                </form>


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

    $("#jefeFamilia").change(function() {
        var valor = $(this).val();
        if (valor == 0) {
            $("#nucleoF").html("<hr /> <h2>Datos Núcleo Familiar</h2>");
            $("#campos").load('nuevaFamilia.php');

        } else {
            $("#nucleoF").html("");
            $("#campos").html("");
        }
    });
</script>