<?php
session_start();
if(isset($_SESSION['logueado'])){
}else{
  header("Location: ../../usuarios/salir.php");
  die();
    }


?>