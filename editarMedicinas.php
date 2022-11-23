<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

if ($_GET['edit'] != 1) {
    header("location:medicina.php");
}

$tituloPagina = 'Editar Medicina';

include_once('mostrar.php');
$registro = mysqli_fetch_array($resultado);


include_once('header.php');
?>
<main>

    <div class="container">
        <div class="row">

            <div class col-lg-12>
                <form action="editar.php?tipo=medicina" method="post" id="editaroMedicina" class="nuevoRegistro">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="cedula" class="form-label" hidden>Cedula</label>
                                <input type="hidden" id="cedula" name="cedula" class="form-control" value="<?= $registro['cedula'] ?>">
                                <label for="id" class="form-label" hidden>Id medicina</label>
                                <input type="hidden" id="id" name="id" class="form-control" value="<?= $registro['idMedicinas'] ?>">

                                <label for="medicamentos" class="form-label">Medicamentos Requeridos</label>
                                <input type="text" id="medicamentos" name="medicamentos" class="form-control" value="<?= $registro['medicamentos'] ?>">
                            </div>
                            <div class="col-lg-4">
                                <label for="patologias" class="form-label">patologías</label>
                                <select name="patologias" id="patologias" class="form-select mi-selector" required>
                                    <option></option>
                                    <option value="Diabetes" <?Php
                                                                if ($registro['patologias'] == 'Diabetes') {
                                                                    echo ' selected="selected"';
                                                                } ?>>Diabetes</option>
                                    <option value="Hipertensión" <?Php
                                                                    if ($registro['patologias'] == 'Hipertensión') {
                                                                        echo ' selected="selected"';
                                                                    } ?>>Hipertensión</option>
                                    <option value="Asma" <?Php
                                                            if ($registro['patologias'] == 'Asma') {
                                                                echo ' selected="selected"';
                                                            } ?>>Asma</option>
                                    <option value="Cancer" <?Php
                                                            if ($registro['patologias'] == 'Cancer') {
                                                                echo ' selected="selected"';
                                                            } ?>>Cancer</option>
                                    <option value="Sinusitis" <?Php
                                                                if ($registro['patologias'] == 'Sinusitis') {
                                                                    echo ' selected="selected"';
                                                                } ?>>Sinusitis</option>
                                    <option value="Tensión Ocular" <?Php
                                                                    if ($registro['patologias'] == 'Tensión Ocular') {
                                                                        echo ' selected="selected"';
                                                                    } ?>>Tensión Ocular</option>
                                    <option value="Autismo" <?Php
                                                            if ($registro['patologias'] == 'Autismo') {
                                                                echo ' selected="selected"';
                                                            } ?>>Autismo</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="embarazadas" class="form-label">Embarazada</label>
                                <select name="embarazadas" id="embarazadas" class="form-select">
                                    <option value="si" <?php if ($registro['embarazadas'] == 'si') {
                                                            echo ' selected="selected"';
                                                        } ?>>si</option>
                                    <option value="no" <?php if ($registro['embarazadas'] == 'no') {
                                                            echo ' selected="selected"';
                                                        } ?>>no</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="discapacidad" class="form-label">Discapacidad</label>
                                <input type="text" id="discapacidad" name="discapacidad" class="form-control" value="<?= $registro['discapacidad'] ?>">
                            </div>
                        </div>
                        <div class="row text-center m-4">
                            <div class="col-lg-12">
                                <input type="submit" value="Guardar" class="btn btn-success">
                                <a href="medicina.php?edit=0&persona=<?= $_GET['persona'] ?>" class="btn btn-primary">Cancelar</a>

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
    })
</script>

<script>
    $(document).ready(function() {


        $('.mi-selector').select2({
            placeholder: "Selecciona una Patología",
            allowClear: true
        });


    });
</script>