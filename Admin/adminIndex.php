<?php 
include("./../conexion.php");
$con = conectar();
session_start();
echo "Hola Admin!!".  $_SESSION["nomb_us"];
?>