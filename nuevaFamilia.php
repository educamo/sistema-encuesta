<?Php

$tituloPagina = 'Nuevo Familiar';

include_once('mostrar.php');

?>



<div class="row">
    <div class="col-lg-4">
        <label for="persona" class="form-label">Jefe de Familia</label>
        <select class='form-select mi-selector' name='persona' id="persona" required>

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
    </div>
    <div class="col-lg-4">
        <label for="parentesco" class="form-label">Su parentesco con el Jefe de Familia</label>
        <select class='form-select' name='parentesco' id="parentesco" required>

            <option value=''>Selecciona un parentesco</option>
            <option value="Padre">Padre</option>
            <option value="Madre">Madre</option>
            <option value="Hijo">Hijo</option>
            <option value="Hija">Hija</option>
            <option value="Esposo">Esposo</option>
            <option value="Esposa">Esposa</option>
            <option value="Hermano">Hermano</option>
            <option value="Hermana">Hermana</option>
            <option value="Otro">Otro</option>

        </select>
    </div>

</div>



<script type="text/javascript">
    $('.mi-selector').select2({
        placeholder: "Selecciona el jefe de su grupo familiar",
        allowClear: true
    });
</script>