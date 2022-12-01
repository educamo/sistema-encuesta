<?Php

if (isset($_GET['pagina'])) {
    $tituloPagina = $_GET['pagina'];
}

## Registor General

// codigo que busca en la bd todos los registros de la tabla general para cargar los datos de la tabla en la vista
//Registro general
if ($tituloPagina == 'Registro General') {

    include_once('conexion.php');
    $consulta = "SELECT * FROM general";
    $resultado = mysqli_query($conexion, $consulta);
}


// codigo que busca los datos a editar en el formulario de Editar Registro General
if ($tituloPagina == 'Editar Registro') {

    $id = $_GET['id'];

    include_once('conexion.php');
    $consulta = "SELECT * FROM general WHERE cedula = $id";
    $resultado = mysqli_query($conexion, $consulta);
    $registro = mysqli_fetch_array($resultado);
    $idVivienda = $registro['NoVivienda'];


    $consultaVivienda = "SELECT * FROM vivienda WHERE NoVivienda = $idVivienda";
    $resultadoVivienda = mysqli_query($conexion, $consultaVivienda);
}
// codigo que busca en la bd todos los registros de la tabla general para cargar los datos del select en la vista
//familia
if ($tituloPagina == 'Registro de familias') {

    include_once('conexion.php');
    $consulta = "SELECT cedula, nombre, apellido FROM general WHERE jefeFamilia = 1";
    $resultado = mysqli_query($conexion, $consulta);
}

// codigo que carga la Familia de la persona seleccionada
if ($tituloPagina == 'Familia') {
    include_once('conexion.php');
    $consultaPersona = "SELECT cedula, nombre, apellido FROM general WHERE cedula = $id";
    $resultadoPersona = mysqli_query($conexion, $consultaPersona);

    $consultaFamilia = "SELECT g.cedula, g.nombre, g.apellido, f.jefeFamilia, f.parentesco FROM general AS g INNER JOIN familia as f ON g.cedula= f.familiar WHERE  f.jefeFamilia = $id";
    $resultadoFamilia = mysqli_query($conexion, $consultaFamilia);
}
// codigo para cargar select de agregar familiar
if ($tituloPagina == 'Nuevo Familiar') {
    include_once('conexion.php');
    $consultaNuevafamilia = "SELECT cedula, nombre, apellido FROM general WHERE jefeFamilia = 1";
    $resultado = mysqli_query($conexion, $consultaNuevafamilia);
}

## Vivienda

// codigo que carga los datos de las personas en el select de vivienda
if ($tituloPagina == 'Registro de vivienda') {
    include_once('conexion.php');
    $consulta = "SELECT cedula, nombre, apellido FROM general";
    $resultado = mysqli_query($conexion, $consulta);
}

// codigo que carga las viviendas de la persona seleccionada
if ($tituloPagina == 'Viviendas') {
    include_once('conexion.php');
    $consultaPersona = "SELECT cedula, nombre, apellido FROM general WHERE cedula = $id";
    $resultadoPersona = mysqli_query($conexion, $consultaPersona);

    $consultaVivienda = "SELECT * FROM vivienda WHERE cedula = $id";
    $resultadoVivienda = mysqli_query($conexion, $consultaVivienda);
}

// codigo que busca los datos a editar en el formulario de Editar Vivienda
if ($tituloPagina == 'Editar Vivienda') {

    $id = $_GET['id'];

    include_once('conexion.php');
    $consulta = "SELECT * FROM vivienda WHERE NoVivienda = $id";
    $resultado = mysqli_query($conexion, $consulta);
}
if ($tituloPagina == 'Nueva Vivienda') {

    $id = $_GET['id'];

    include_once('conexion.php');
    $consulta = "SELECT * FROM vivienda WHERE NoVivienda = $id";
    $resultado = mysqli_query($conexion, $consulta);
    $r = mysqli_fetch_row($resultado);
    echo json_encode($r);
}

## Medicina

// codigo que carga los datos de las personas en el select de medicina
if ($tituloPagina == 'Registro de Medicina') {
    include_once('conexion.php');
    $consulta = "SELECT cedula, nombre, apellido FROM general";
    $resultado = mysqli_query($conexion, $consulta);
}

// codigo que carga las medicinas de la persona seleccionada
if ($tituloPagina == 'Medicinas') {
    include_once('conexion.php');
    $consultaPersona = "SELECT cedula, nombre, apellido FROM general WHERE cedula = $id";
    $resultadoPersona = mysqli_query($conexion, $consultaPersona);

    $consultasalud = "SELECT * FROM salud WHERE cedula = $id";
    $resultadoMedicina = mysqli_query($conexion, $consultasalud);
}

// codigo que busca los datos a editar en el formulario de Editar Medicinas
if ($tituloPagina == 'Editar Medicina') {

    $id = $_GET['id'];

    include_once('conexion.php');
    $consulta = "SELECT * FROM salud WHERE idMedicinas = $id";
    $resultado = mysqli_query($conexion, $consulta);
}

## Gas

// codigo que carga los datos de las personas en el select de Gas
if ($tituloPagina == 'Registro de Gas') {
    include_once('conexion.php');
    $consulta = "SELECT cedula, nombre, apellido FROM general WHERE jefeFamilia = 1";
    $resultado = mysqli_query($conexion, $consulta);
}

// codigo que carga el Gas de la persona seleccionada
if ($tituloPagina == 'gas') {
    include_once('conexion.php');
    $consultaPersona = "SELECT cedula, nombre, apellido FROM general WHERE cedula = $id";
    $resultadoPersona = mysqli_query($conexion, $consultaPersona);

    $consultaGas = "SELECT * FROM gas WHERE cedula = $id";
    $resultadogas = mysqli_query($conexion, $consultaGas);
}

// codigo que busca los datos a editar en el formulario de Editar Gas
if ($tituloPagina == 'Editar Gas') {

    $id = $_GET['id'];

    include_once('conexion.php');
    $consulta = "SELECT * FROM gas WHERE idGas = $id";
    $resultado = mysqli_query($conexion, $consulta);
}

if ($tituloPagina == 'Patologias') {

    $id = '"' . $id . '"';
    include_once('conexion.php');
    $consultaPatologia = "SELECT * FROM salud as s INNER JOIN general as g ON s.cedula = g.cedula WHERE patologias = $id";
    $resultadopatologia  = mysqli_query($conexion, $consultaPatologia);
}

if ($tituloPagina == 'listViviendas'){
    $id = '"' . $id . '"';
    include_once('conexion.php');
    $consultavivienda = "SELECT * FROM vivienda WHERE tipoVivienda = $id";
    $resultadoVivienda = mysqli_query($conexion, $consultavivienda);
}
