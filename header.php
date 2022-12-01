<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <script src="assets/js/jquery-3.6.1.min.js"></script>
  <link rel="shortcut icon" href="assets/image/logo.png" type="image/x-icon">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css" />
  <link rel="stylesheet" type="text/css" href="assets/lib/DataTables/datatables.css">



  <!-- alertify -->
  <!-- include the script -->
  <script src="assets/lib/alertifyjs/alertify.min.js"></script>
  <!-- include the style -->
  <link rel="stylesheet" href="assets/lib/alertifyjs/css/alertify.min.css" />
  <!-- include a theme -->
  <link rel="stylesheet" href="assets/lib/alertifyjs/css/themes/bootstrap.min.css" />


  <!-- select2 -->
  <link href="assets/lib/select2/dist/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



  <link rel="stylesheet" href="assets/css/estilos.css">
  <title>Brisas de Carvenca</title>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <img src="assets/image/logo.png" alt="logo" class="logo img-responsive">
      <h1 class="navbar-brand"> <?= $tituloPagina ?> - CARVENCA</h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="registrogeneral.php"><i class="fa fa-id-card"></i> Registro General</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="familia.php"><i class="fa fa-group"></i> Familias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="listvivienda.php"><i class="fa fa-home"></i> Viviendas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="salud.php"><i class="fa fa-heartbeat"></i> Salud</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="gas.php"><i class="fa fa-fire"></i>  Gas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="logout.php"><i class="fa fa-times"></i> Salir</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>