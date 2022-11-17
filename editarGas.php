<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

if ($_GET['edit'] != 1) {
    header("location:gas.php");
}

$tituloPagina = 'Editar Gas';

include_once('mostrar.php');
$registro = mysqli_fetch_array($resultado);


include_once('header.php');
?>
<main>

    <div class="container">
        <div class="row">

            <div class col-lg-12>
                <form action="editar.php?tipo=gas" method="post" id="editargas" class="nuevoRegistro">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="cedula" class="form-label" hidden>CEDULA</label>
                                <input type="hidden" id="cedula" value="<?= $_GET['persona'] ?>" name="cedula" class="form-control" required>
                                <label for="idGas" class="form-label" hidden>Número de Bombona</label>
                                <input type="hidden" id="idGas" name="idGas" class="form-control" value="<?= $registro['idGas'] ?>" required>
                                <label for="cantidad" class="form-label">Cantidad que posee</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" value="<?= $registro['cantidad'] ?>" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select name="tipo" id="tipo" class="form-select" required>
                                    <option value="10" <?Php
                                                        if ($registro['tipo'] === '10') {
                                                            echo 'selected';
                                                        }
                                                        ?>>10Kg</option>
                                    <option value="18" <?Php
                                                        if ($registro['tipo'] === '18') {
                                                            echo 'selected';
                                                        }
                                                        ?>>18Kg</option>
                                    <option value="27" <?Php
                                                        if ($registro['tipo'] === '27') {
                                                            echo 'selected';
                                                        }
                                                        ?>>27Kg</option>
                                    <option value="43" <?Php
                                                        if ($registro['tipo'] === '45') {
                                                            echo 'selected';
                                                        }
                                                        ?>>43Kg</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="bombonaSocial" class="form-label">Requiere Bombona Social</label>
                                <select name="bombonaSocial" id="bombonaSocial" class="form-select">
                                    <option value="0" <?Php
                                                        if ($registro['bombonaSocial'] === '0') {
                                                            echo 'selected';
                                                        }
                                                        ?>>No</option>
                                    <option value="1" <?Php
                                                        if ($registro['bombonaSocial'] === '1') {
                                                            echo 'selected';
                                                        }
                                                        ?>>Si</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="codigo" class="form-label">Código</label>
                                <input type="text" id="codigo" name="codigo" class="form-control" value="<?= $registro['codigo'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row text-center m-4">
                        <div class="col-lg-12">
                            <input type="submit" value="Guardar" class="btn btn-success">
                            <a href="gas.php?edit=0&persona=<?= $_GET['persona'] ?>" class="btn btn-primary">Cancelar</a>

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
    $(Document).ready(function() {
        $('.btn-primary').click(function() {
            alertify.message('Se Cancelo la Operación');
        });
    });
</script>