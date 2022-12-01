            <?Php
            session_start();
            if (!isset($_SESSION['usuario'])) {
                header("location:login.php");
            }

            $tituloPagina = 'Registro General';

            include('mostrar.php');

            $filas = mysqli_num_rows($resultado);

            include_once('header.php');
            ?>
            <main class="container separacion">

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Listado de Personas</h2>
                    </div>
                    <div class="col-lg-12 text-end">
                    <a href="gas.php" class="btn btn-primary" title="Gas"><i class="fa fa-fire"></i></a>
                        <a href="pdfpersonas.php" class="btn btn-info" title="Imprimir" target="_blank"><i class="fa fa-print"></i></a>
                    </div>

                    <div class="col-lg-8 mb-5">
                        <a href="nuevoRegistro.php?new=1" class="btn btn-success" title="Nuevo"><i class="fa fa-plus"></i> Nuevo Registro</a>
                    </div>

                    <div class="col-lg-12">
                        <?Php
                        if ($filas <= 0) {
                            echo "<h2 class='mt-4 p-3 text-black alert alert-warning' role='alert'> No Hay Registros de personas</h2>";
                        } else {
                        ?>
                            <table class="table table-striped display" id="personas">

                                <thead>
                                    <tr>
                                        <th>CEDULA</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO</th>
                                        <th>SEXO</th>
                                        <th>FECHA DE NACIMIENTO</th>
                                        <th>ESTADO CIVIL</th>
                                        <th>TELEFONO</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_array($resultado)) {
                                    $id = $row['cedula'];
                                ?>
                                    <tr>

                                        <td><?= $row['cedula'] ?></td>
                                        <td><?= $row['nombre'] ?></td>
                                        <td><?= $row['apellido'] ?></td>
                                        <td><?= $row['sexo'] ?></td>
                                        <td><?= $row['nacimiento'] ?></td>
                                        <td><?= $row['edoCivil'] ?></td>
                                        <td><?= $row['telefono'] ?></td>
                                        <td>
                                            <a href="medicina.php?persona=<?= $id ?>" class="btn btn-success" title="Salud"><i class="fa fa-plus"></i></a>
                                            <a href="editarRegistro.php?edit=1&tipo=registro&id='<?= $id ?>'" class="btn btn-warning" title="Editar"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger" title="Borrar"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                <?php
                                }
                                mysqli_free_result($resultado);
                                mysqli_close($conexion);
                                ?>

                            </table>
                        <?Php
                        }
                        ?>

                    </div>
                </div>
            </main>

            <script type="text/javascript">
                var tablaId = "#personas";

                $('.btn-danger').click(function(e) {
                    e.preventDefault();
                    //override defaults

                    alertify.defaults.glossary.ok = 'Si';
                    alertify.defaults.glossary.cancel = 'No';
                    alertify.defaults.transition = "zoom";
                    alertify.defaults.theme.ok = "btn btn-primary";
                    alertify.defaults.theme.cancel = "btn btn-danger";
                    alertify.defaults.theme.input = "form-control";
                    alertify.confirm('Confirmación', 'Desea Eliminar el Registro?',
                        function() {
                            window.location.href = "borrar.php?tipo=registro&id='<?= $id ?>'&accion=1"
                        },
                        function() {
                            alertify.error('Cancelado')
                        });
                })
            </script>

            <?php include_once('footer.php'); ?>