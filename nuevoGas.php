<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

if ($_GET['new'] != 1) {
    header("location:gas.php");
}

$tituloPagina = 'Nueva Gas';


include_once('header.php');
?>
<main>

    <div class="container">
        <div class="row">

            <div class col-lg-12>
                <form action="guardar.php?tipo=gas" method="post" id="nuevoSgas" class="nuevoRegistro">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="cedula" class="form-label" hidden>CEDULA</label>
                                <input type="hidden" id="cedula" value="<?= $_GET['id'] ?>" name="cedula" class="form-control" required>
                                <label for="idGas" class="form-label">Número de Bombona</label>
                                <input type="text" id="idGas" name="idGas" class="form-control" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="cantidad" class="form-label">Cantidad que posee</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" value="1" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select name="tipo" id="tipo" class="form-select" required>
                                    <option value="10">10Kg</option>
                                    <option value="18">18Kg</option>
                                    <option value="27">27Kg</option>
                                    <option value="43">43Kg</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="bombonaSocial" class="form-label">Requiere Bombona Social</label>
                                <select name="bombonaSocial" id="bombonaSocial" class="form-select">
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="codigo" class="form-label">Código</label>
                                <input type="text" id="codigo" name="codigo" class="form-control" value="n/a">
                            </div>
                        </div>
                        <div class="row text-center mt-4">
                            <div class="col-lg-12">
                                <input type="submit" value="Guardar" class="btn btn-success">
                                <a href="gas.php?new=0&persona=<?= $_GET['id'] ?>" class="btn btn-primary">Cancelar</a>

                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
</main>


<?php include_once('footer.php'); ?>


<script type="text/javascript">
    $(Document).ready(function() {
        $('.btn-primary').click(function() {
            alertify.message('Se Cancelo la Operación');
        });
    });
</script>