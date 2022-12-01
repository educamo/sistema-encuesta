<?Php


$tituloPagina = 'Nueva Vivienda';

?>

<div class="row">



    <div class="col-lg-4">
        <label for="NoVivienda" class="form-label">Número de la Vivienda</label>
        <input type="text" id="NoVivienda" name="NoVivienda" class="form-control" required>
    </div>
    <div class="col-lg-4">
        <label for="calle" class="form-label">calle</label>
        <input type="text" id="calle" name="calle" class="form-control" required>
    </div>
    <div class="col-lg-4">
        <label for="tipoVivienda" class="form-label">Tipo de Vivienda</label>
        <select name="tipoVivienda" id="tipoVivienda" class="form-select" required>
            <option value="casa">Casa</option>
            <option value="apartamento">Apartamento</option>
            <option value="rancho">Rancho</option>
            <option value="hacienda">Hacienda</option>
            <option value="cabaña">Cabaña</option>
            <option value="anexo">Anexo</option>
            <option value="otro">otro</option>
        </select>
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
        <select name="agua" id="agua" class="form-select" required>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
    </div>
    <div class="col-lg-4">
        <label for="luz" class="form-label">Luz</label>
        <select name="luz" id="luz" class="form-select" required>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
    </div>
    <div class="col-lg-4">
        <label for="aguanegras" class="form-label">Aguas negras</label>
        <select name="aguanegras" id="aguanegras" class="form-select" required>
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
    </div>


</div>



<script type="text/javascript">
    $(document).ready(function() {
        $('#NoVivienda').focusout(function() {
            var NoVivienda = $(this).val();
            var urlajax = "mostrar.php";
            var tituloPagina = '<?= $tituloPagina ?>';

            $.ajax({

                // The URL for the request
                url: urlajax,

                // The data to send (will be converted to a query string)
                data: {
                    id: NoVivienda,
                    pagina: tituloPagina
                },

                // Whether this is a POST or GET request
                type: "GET",
                beforeSend: function() {
                    $('#calle').prop("disabled", "disabled");
                    $('#tipoVivienda').prop("disabled", "disabled");
                    $('#condicion').prop("disabled", "disabled");
                    $('#tipoTecho').prop("disabled", "disabled");
                    $('#tipoPiso').prop("disabled", "disabled");
                    $('#agua').prop("disabled", "disabled");
                    $('#luz').prop("disabled", "disabled");
                    $('#aguanegras').prop("disabled", "disabled");
                    $('#calle').val('');
                    $('#tipoVivienda').val('');
                    $('#condicion').val('');
                    $('#tipoTecho').val('');
                    $('#tipoPiso').val('');
                    $('#agua').val('');
                    $('#luz').val('');
                    $('#aguanegras').val('');
                },
                success: function(r) {
                    $('#calle').removeAttr("disabled");
                    $('#tipoVivienda').removeAttr("disabled");
                    $('#condicion').removeAttr("disabled");
                    $('#tipoTecho').removeAttr("disabled");
                    $('#tipoPiso').removeAttr("disabled");
                    $('#agua').removeAttr("disabled");
                    $('#luz').removeAttr("disabled");
                    $('#aguanegras').removeAttr("disabled");
                    var data = JSON.parse(r);
                    datos = data;
                    $('#calle').val(datos[1]);
                    $('#tipoVivienda').val(datos[2]);
                    $('#condicion').val(datos[3]);
                    $('#tipoTecho').val(datos[4]);
                    $('#tipoPiso').val(datos[5]);
                    $('#agua').val(datos[6]);
                    $('#luz').val(datos[7]);
                    $('#aguanegras').val(datos[8]);

                },
                error: function(r) {

                }
            });



        });
    });
</script>