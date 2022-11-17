<?Php
session_start();
if (isset($_SESSION['usuario'])) {
    header("location:home.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="assets/js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <title>INGRESAR</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Inicio de Sesión</h1>
            </div>
        </div>
        <div class="row">
            <section class="login">
                <form action="validar.php" method="post" style="margin-top: 0px;">
                            <p class="etiquetas">usuario<input class="controls" type="text" placeholder="ingrese su nombre" id="usuario" name="usuario"></p>
                            <p class="etiquetas">contraseña<input class="controls" type="password" placeholder="ingrese su contraseña" id="contra" name="contra"></p>
                            <input class="btn btn-primary" type="submit" value="ingresar">
                    <?Php
                    if (isset($mensaje)) {
                    ?>
                        <div class="alert alert-danger mt-2 mb-1 text-center" role="alert">Usuario o Contraseña incorrecto</div>
                    <?Php
                    }
                    ?>
                </form>
            </section>
        </div>
    </div>

    <?php include_once('footer.php'); ?>