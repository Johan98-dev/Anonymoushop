<?php 
include("./../conexion.php");
$con = conectar();
session_start();
echo "Hola Admin!!".  $_SESSION["nomb_us"];
?>
<!DOCTYPE html>
	<html>
		<head><title>Cuenta|AnonymouShop</title>
		    <link rel="shortcut icon" type="image/x-icon" href="img/icono.png">
			<link type=" text/css" rel="stylesheet" href="css/style.css"/> 
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link href="https://fonts.googleapis.com/css?family=Molle:400i&display=swap" rel="stylesheet"> 
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		
		<body>
		<div class="supBar"><img  id="logoBar" src="img/icono.png"></div>
		<br> <br> <br> <br> <br>
		 <div class="container">
			<div class='row'>
				<div class='col-md-12 '>
				<div class='col-md-2 '>
					<div id="menu">
							<ul>
							    <li><a href="bitacora.php" style="color:#FFFF;" >Bitácora</a></li>
								<li><a href="veradmins.php" style="color:#FFFF;" >Admins</a></li>
								<li><a href="verproduc.php" style="color:#FFFF;">Productos</a></li>
								<li><a href="verprov.php" style="color:#FFFF;">Proveedores</a></li>
								<li><a href="logout.php" style="color:#FFFF;">Log out</a></li>
							</ul>
					</div>
				</div>
		<div class='col-md-1 '>
			<br> <br> <br> 
                    <div class="jumbotron">
					<center>
                        <h1>Bienvenidos a AnonymouShop</h1>
                        <?php
                       echo "Hola Admin ".  $_SESSION["nomb_us"]; 
                       ?>
					</center>
                    </div>
			</div>
			</div>
		</div>
		</div>
		</body>
	</html>