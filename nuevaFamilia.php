<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

if ($_GET['new'] != 1) {
    header("location:familia.php?persona" + $_GET['id']);
}

$tituloPagina = 'Nuevo Familiar';

include_once('mostrar.php');


include_once('header.php');
?>
<main>

    <div class="container">
        <div class="row">

            <div class col-lg-12>
                <form action="guardar.php?tipo=familiar" method="post" id="nuevoFamiliar" class="nuevoRegistro">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="persona" class="form-label">PERSONA A AGREGAR COMO FAMILIAR</label>
                                <select class='form-select mi-selector' name='persona' id="persona">

                                    <option value=''></option>
                                    <?php
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        $id = $row['cedula'];
                                        $nom = $row['nombre'];
                                        $apelli = $row['apellido'];
                                    ?>
                                        <option value="<?= $id ?>"><?= $id . ' - ' . $nom . " " . $apelli ?></option>
                                    <?php
                                    }
                                    mysqli_free_result($resultado);
                                    mysqli_close($conexion);
                                    ?>


                                </select>
                                <input type="hidden" name="familiar" id="familiar">
                                <input type="hidden" name="jefeFamilia" id="jefeFamilia" value="<?= $_GET['id'] ?>">
                            </div>
                            <div class="row text-center mt-4">
                                <div class="col-lg-12">
                                    <input type="submit" value="Guardar" class="btn btn-success">
                                    <a href="familia.php?persona=<?= $_GET['id'] ?>" class="btn btn-primary">Cancelar</a>

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

<script>
    $(document).ready(function() {


        $('.mi-selector').select2({
            placeholder: "Selecciona una persona",
            allowClear: true
        });


        $(".mi-selector").change(function() {
            var familiar = $(this).val();
            $('#familiar').val(familiar);
        });


    });
</script>