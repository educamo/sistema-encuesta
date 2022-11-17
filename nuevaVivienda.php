<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

if ($_GET['new'] != 1) {
    header("location:vivienda.php");
}

$tituloPagina = 'Nueva Vivienda';

include_once('header.php');
?>
<main>

    <div class="container">
        <div class="row">

            <div class col-lg-12>
                <form action="guardar.php?tipo=vivienda" method="post" id="nuevaVivienda" class="nuevoRegistro">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="NoVivienda" class="form-label">Número de la Vivienda</label>
                                <input type="text" id="NoVivienda" name="NoVivienda" class="form-control" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="cedula" class="form-label" hidden>CEDULA</label>
                                <input type="hidden" id="cedula" value="<?= $_GET['id'] ?>" name="cedula" class="form-control" required>
                                <label for="tipoVivienda" class="form-label">Tipo de Vivienda</label>
                                <input type="text" id="tipoVivienda" name="tipoVivienda" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="condicion" class="form-label">Condición</label>
                                <input type="text" id="condicion" name="condicion" class="form-control" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="tipoTecho" class="form-label">Tipo de Techo</label>
                                <input type="text" id="tipoTecho" name="tipoTecho" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="tipoPiso" class="form-label">Tipo de Piso</label>
                                <input type="text" id="tipoPiso" name="tipoPiso" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="agua" class="form-label">Agua</label>
                                <select name="agua" id="agua" class="form-select">
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="luz" class="form-label">Luz</label>
                                <select name="luz" id="luz" class="form-select">
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="aguanegras" class="form-label">Aguas negras</label>
                                <select name="aguanegras" id="aguanegras" class="form-select">
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row text-center mt-4">
                            <div class="col-lg-12">
                                <input type="submit" value="Guardar" class="btn btn-success">
                                <a href="vivienda.php?new=0&persona=<?= $_GET['id'] ?>" class="btn btn-primary">Cancelar</a>

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
    })
</script>