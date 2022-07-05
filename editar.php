<?Php
$tipo = $_GET['tipo'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    <?Php

    // codigo que se ejecuta cuando se editar un registro general
    if ($tipo == 'registro') {

        $cedula = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sexo = $_POST['sexo'];
        $nacimiento = $_POST['nacimiento'];
        $edoCivil = $_POST['edoCivil'];
        $telefono = $_POST['telefono'];

        include_once('conexion.php');
        $query = "UPDATE general SET nombre = '$nombre', apellido = '$apellido', sexo = '$sexo', nacimiento = '$nacimiento', edoCivil = '$edoCivil', telefono = '$telefono' WHERE cedula = $cedula";

        if (mysqli_query($conexion, $query)) {
            $msj = "Registro actualizado con éxito";
            echo "<h1 style='color: white; text-align: center;margin-top: 05%;background-color: green;padding: 5px;'>" . $msj . "</h1>";
            echo "<div style='text-align: center;'><a href='registrogeneral.php' style='text-decoration: none;'><span style='width: 10px;background-color: cornflowerblue;padding: 10px;color: white;border-radius: 5px;'>continuar</span></a></div>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        };
    }

    // codigo que se ejecuta cuando se edita una vivienda
    if ($tipo == 'vivienda') {

        $cedula = $_POST['cedula'];
        $codigoVivienda = $_POST['id'];
        $tipoVivienda = $_POST['tipoVivienda'];
        $condicion = $_POST['condicion'];
        $tipoTecho = $_POST['tipoTecho'];
        $tipoPiso = $_POST['tipoPiso'];
        $agua = $_POST['agua'];
        $luz = $_POST['luz'];
        $aguasNegras = $_POST['aguasNegras'];

        include_once('conexion.php');
        $query = "UPDATE vivienda SET tipoVivienda = '$tipoVivienda', condicion = '$condicion', tipoTecho = '$tipoTecho', tipoPiso = '$tipoPiso', agua = '$agua', luz = '$luz', aguasNegras = '$aguasNegras' WHERE codigoVivienda = $codigoVivienda";

        if (mysqli_query($conexion, $query)) {
            $msj = "Vivienda actualizada con éxito";
            echo "<h1 style='color: white; text-align: center;margin-top: 05%;background-color: green;padding: 5px;'>" . $msj . "</h1>";
            echo "<div style='text-align: center;'><a href='vivienda.php?persona=".$cedula."' style='text-decoration: none;'><span style='width: 10px;background-color: cornflowerblue;padding: 10px;color: white;border-radius: 5px;'>continuar</span></a></div>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        };
    }
    
    // codigo que guarda la edicion de las medicinas
    if ($tipo == 'medicina') {

        $cedula = $_POST['cedula'];
        $codigoSalud = $_POST['id'];
        $medicamentos = $_POST['medicamentos'];
        $patologias = $_POST['patologias'];
        $embarazadas = $_POST['embarazadas'];
        $discapacidad = $_POST['discapacidad'];
        
        include_once('conexion.php');
        $query = "UPDATE salud SET medicamentos = '$medicamentos', patologias = '$patologias', embarazadas = '$embarazadas', discapacidad = '$discapacidad' WHERE codigoSalud = $codigoSalud";

        if (mysqli_query($conexion, $query)) {
            $msj = "Registro de Salud actualizado con éxito";
            echo "<h1 style='color: white; text-align: center;margin-top: 05%;background-color: green;padding: 5px;'>" . $msj . "</h1>";
            echo "<div style='text-align: center;'><a href='medicina.php?persona=".$cedula."' style='text-decoration: none;'><span style='width: 10px;background-color: cornflowerblue;padding: 10px;color: white;border-radius: 5px;'>continuar</span></a></div>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        };
    }

    // codigo que guarda la edicion de las medicinas
    if ($tipo == 'gas') {

        $cedula = $_POST['cedula'];
        $codigoGas = $_POST['id'];
        $tipo = $_POST['tipo'];
        $bombonaSocial = $_POST['bombonaSocial'];
        $codigo = $_POST['codigo'];
        
        include_once('conexion.php');
        $query = "UPDATE gas SET tipo = '$tipo', bombonaSocial = '$bombonaSocial', codigo = '$codigo' WHERE codigoGas = $codigoGas";

        if (mysqli_query($conexion, $query)) {
            $msj = "Registro de Gas actualizado con éxito";
            echo "<h1 style='color: white; text-align: center;margin-top: 05%;background-color: green;padding: 5px;'>" . $msj . "</h1>";
            echo "<div style='text-align: center;'><a href='gas.php?persona=".$cedula."' style='text-decoration: none;'><span style='width: 10px;background-color: cornflowerblue;padding: 10px;color: white;border-radius: 5px;'>continuar</span></a></div>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        };
    }


    mysqli_close($conexion);
    ?>
</body>

</html>