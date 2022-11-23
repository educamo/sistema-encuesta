<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}

if ($_GET['new'] != 1) {
    header("location:medicina.php");
}

$tituloPagina = 'Nueva Medicina';

include_once('header.php');
?>
<main>

    <div class="container">
        <div class="row">

            <div class col-lg-12>
                <form action="guardar.php?tipo=medicina" method="post" id="nuevaMedicina" class="nuevoRegistro">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="cedula" class="form-label" hidden>CEDULA</label>
                                <input type="hidden" id="cedula" value="<?= $_GET['id'] ?>" name="cedula" class="form-control" required>
                                <label for="medicamentos" class="form-label">Medicamentos Requeridos</label>
                                <input type="text" id="medicamentos" name="medicamentos" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label for="patologias" class="form-label">Patologías</label>
                                <select name="patologias" id="patologias" class="form-select mi-selector" required>
                                    <option></option>
                                    <option value="Diabetes">Diabetes</option>
                                    <option value="Hipertensión">Hipertensión</option>
                                    <option value="Asma">Asma</option>
                                    <option value="Cancer">Cancer</option>
                                    <option value="Sinusitis">Sinusitis</option>
                                    <option value="Tensión Ocular">Tensión Ocular</option>
                                    <option value="Autismo">Autismo</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="embarazadas" class="form-label">Embarazada</label>
                                <select name="embarazadas" id="embarazadas" class="form-select">
                                    <option value="si">Si</option>
                                    <option value="no" selected>No</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="discapacidad" class="form-label">Discapacidad</label>
                                <input type="text" id="discapacidad" name="discapacidad" class="form-control" required>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-lg-12">
                                <input type="submit" value="Guardar" class="btn btn-success">
                                <a href="medicina.php?new=0&persona=<?= $_GET['id'] ?>" class="btn btn-primary">Cancelar</a>

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
            placeholder: "Selecciona una Patología",
            allowClear: true
        });


    });
</script>