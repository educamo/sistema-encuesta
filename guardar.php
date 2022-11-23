<?Php
$tipo = $_GET['tipo'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    <?Php

    // codigo que se ejecuta para guardar un nuevo registro general
    if ($tipo == 'registro') {

        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sexo = $_POST['sexo'];
        $nacimiento = $_POST['nacimiento'];
        $edoCivil = $_POST['edoCivil'];
        $telefono = $_POST['telefono'];
        $jefeFamilia = $_POST['jefeFamilia'];

        include_once('conexion.php');
        $query = "INSERT INTO general (cedula, nombre, apellido, sexo, nacimiento, edoCivil, telefono, jefeFamilia) VALUES ('$cedula', '$nombre', '$apellido', '$sexo', '$nacimiento', '$edoCivil', '$telefono', '$jefeFamilia')";

        if (mysqli_query($conexion, $query)) {
            $msj = "Nuevo registro creado con éxito";
            echo "<h1 style='text-align: center; margin-top: 05%; padding: 5px;' class='alert alert-success' role='alert'>" . $msj . "</h1>";
            echo "<div style='text-align: center;'><a href='registrogeneral.php' class='btn btn-success'>continuar</a></div>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        };
    }

    if ($tipo == 'familiar') {
        $familiar = $_POST['familiar'];
        $jefeFamilia = $_POST['jefeFamilia'];

        include_once('conexion.php');
        $query = "INSERT INTO familia (familiar, jefeFamilia) VALUES ('$familiar', '$jefeFamilia')";

        if (mysqli_query($conexion, $query)) {
            $msj = "Se ha agregado el familiar con éxito";
            echo "<h1 style='text-align: center; margin-top: 05%; padding: 5px;' class='alert alert-success' role='alert'>" . $msj . "</h1>";
            echo "<div style='text-align: center;'><a href='familia.php?persona=" . $jefeFamilia . "' class='btn btn-success'>continuar</a></div>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        };
    }

    // codigo guarda los datos de la nueva vivienda
    if ($tipo == 'vivienda') {

        $NoVivienda = $_POST['NoVivienda'];
        $cedula = $_POST['cedula'];
        $tipoVivienda = $_POST['tipoVivienda'];
        $condicion = $_POST['condicion'];
        $tipoTecho = $_POST['tipoTecho'];
        $tipoPiso = $_POST['tipoPiso'];
        $agua = $_POST['agua'];
        $luz = $_POST['luz'];
        $aguanegras = $_POST['aguanegras'];

        include_once('conexion.php');
        $query = "INSERT INTO vivienda (NoVivienda, cedula, tipoVivienda, condicion, tipoTecho, tipoPiso, agua, luz, aguasNegras) VALUES ('$NoVivienda', '$cedula', '$tipoVivienda', '$condicion', '$tipoTecho', '$tipoPiso', '$agua', '$luz', '$aguanegras')";

        if (mysqli_query($conexion, $query)) {
            $msj = "Vivienda creada con éxito";
            echo "<h1 style='text-align: center; margin-top: 05%; padding: 5px;' class='alert alert-success' role='alert'>" . $msj . "</h1>";
            echo "<div style='text-align: center;'><a href='vivienda.php?persona=" . $cedula . "' class='btn btn-success'>continuar</a></div>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        };
    }

    // codigo guarda los nuevos datos de salud
    if ($tipo == 'medicina') {

        $cedula = $_POST['cedula'];
        $medicamentos = $_POST['medicamentos'];
        $patologias = $_POST['patologias'];
        $embarazadas = $_POST['embarazadas'];
        $discapacidad = $_POST['discapacidad'];

        include_once('conexion.php');
        $query = "INSERT INTO salud (cedula, medicamentos, patologias, embarazadas, discapacidad) VALUES ('$cedula', '$medicamentos', '$patologias', '$embarazadas', '$discapacidad')";

        if (mysqli_query($conexion, $query)) {
            $msj = "Regsitro de Salud creado con éxito";
            echo "<h1 style='text-align: center; margin-top: 05%; padding: 5px;' class='alert alert-success' role='alert'>" . $msj . "</h1>";
            echo "<div style='text-align: center;'><a href='medicina.php?persona=" . $cedula . "' class='btn btn-success'>continuar</a></div>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        };
    }

    //codigo guarda datos nuevo registro gas
    if ($tipo == 'gas') {

        $idGas = $_POST['idGas'];
        $cedula = $_POST['cedula'];
        $tipo = $_POST['tipo'];
        $cantidad = $_POST['cantidad'];
        $bombonaSocial = $_POST['bombonaSocial'];
        $codigo = $_POST['codigo'];

        include_once('conexion.php');
        $query = "INSERT INTO gas (idGas, cedula, cantidad, tipo, bombonaSocial, codigo) VALUES ('$idGas','$cedula', '$cantidad', '$tipo', '$bombonaSocial', '$codigo')";

        if (mysqli_query($conexion, $query)) {
            $msj = "Registro de Gas creado con éxito";
            echo "<h1 style='text-align: center; margin-top: 05%; padding: 5px;' class='alert alert-success' role='alert'>" . $msj . "</h1>";
            echo "<div style='text-align: center;'><a href='gas.php?persona=" . $cedula . "' class='btn btn-success'>continuar</a></div>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        };
    }


    mysqli_close($conexion);
    ?>
</body>

</html>