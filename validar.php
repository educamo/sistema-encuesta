<?php 
include('conexion.php');
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];




$consulta="SELECT*FROM login where usuario='$usuario' and contra='$contra'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0){
    session_start();

    $datosUsuario=mysqli_fetch_array($resultado);
    $_SESSION['usuario']=$usuario;
    $_SESSION['nombreUsuario'] = $datosUsuario['nombre'];  
    header("location:home.php");

}else{
    include("login.php");

  ?>
  <h1 class="bad">Usuario o Contraseña incorrecto</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
