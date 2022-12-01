<?Php

$tituloPagina = 'Editar Vivienda';

include_once('mostrar.php');
$registro = mysqli_fetch_array($resultadoVivienda);


?>



<div class="row">
    <div class="col-lg-4">
        <label for="calle" class="form-label">calle</label>
        <input type="text" id="calle" name="calle" class="form-control" value="<?= $registro['calle'] ?>">
    </div>
    <div class="col-lg-4">
    <label for="tipoVivienda" class="form-label">Tipo de Vivienda</label>
        <input type="text" id="tipoVivienda" name="tipoVivienda" class="form-control" value="<?= $registro['tipoVivienda'] ?>">
    </div>
    <div class="col-lg-4">
        <label for="condicion" class="form-label">Condición</label>
        <input type="text" id="condicion" name="condicion" class="form-control" value="<?= $registro['condicion'] ?>">
    </div>
    <div class="col-lg-4">
        <label for="tipoTecho" class="form-label">Tipo de Techo</label>
        <input type="text" id="tipoTecho" name="tipoTecho" class="form-control" value="<?= $registro['tipoTecho'] ?>">
    </div>
    <div class="col-lg-4">
        <label for="tipoPiso" class="form-label">Tipo de Piso</label>
        <input type="text" id="tipoPiso" name="tipoPiso" class="form-control" value="<?= $registro['tipoPiso'] ?>">
    </div>
    <div class="col-lg-4">
        <label for="agua" class="form-label">Agua</label>
        <select name="agua" id="agua" class="form-select">
            <option value="si" <?php if ($registro['agua'] == 'si') {
                                    echo ' selected="selected"';
                                } ?>>si</option>
            <option value="no" <?php if ($registro['agua'] == 'no') {
                                    echo ' selected="selected"';
                                } ?>>no</option>
        </select>
    </div>
    <div class="col-lg-4">
        <label for="luz" class="form-label">Luz</label>
        <select name="luz" id="luz" class="form-select">
            <option value="si" <?php if ($registro['luz'] == 'si') {
                                    echo ' selected="selected"';
                                } ?>>si</option>
            <option value="no" <?php if ($registro['luz'] == 'no') {
                                    echo ' selected="selected"';
                                } ?>>no</option>
        </select>
    </div>
    <div class="col-lg-4">
        <label for="aguanegras" class="form-label">Aguas Negras</label>
        <select name="aguanegras" id="aguanegras" class="form-select">
            <option value="si" <?php if ($registro['aguasNegras'] == 'si') {
                                    echo ' selected="selected"';
                                } ?>>si</option>
            <option value="no" <?php if ($registro['aguasNegras'] == 'no') {
                                    echo ' selected="selected"';
                                } ?>>no</option>
        </select>
    </div>
</div>




<script type="text/javascript">
    $('.btn-primary').click(function() {
        alertify.message('Se Cancelo la Operación');
    })
</script>