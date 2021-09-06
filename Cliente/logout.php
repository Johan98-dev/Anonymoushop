<?php 
	error_reporting(E_ALL);
	ini_set("display_errors", true);

	include("./../conexion.php");
	$con = conectar();

    @session_start();

		session_destroy();
        header("Location: ./../inicio.php");
	
?>
