<?Php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:login.php");
}


$tituloPagina = 'Reporte Patologías';


include_once('header.php');
?>
<main>

    <div class="container">
        <div class="row">

            <div class col-lg-12>
                <form action="pdfPatologia.php" method="post" id="pdfPatologias" class="nuevoRegistro" target="_blank">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-4">
                                <label for="patologias" class="form-label">patologías</label>
                            </div>
                            <div class="col-lg-6">
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
                            <div class="col-lg-2">
                                <input type="submit" value="Ver Reporte" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
</main>

<?php include_once('footer.php'); ?>

<script>
    $(document).ready(function() {


        $('.mi-selector').select2({
            placeholder: "Selecciona una Patología",
            allowClear: true
        });


    });
</script>