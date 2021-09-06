<?php 
	include("./../conexion.php");
	$con = conectar();
?>
<!DOCTYPE html>
	<html>
		<head><title>Bitácora</title>
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
								<li>Inicio</li>
								<li>Estadisticas</li>
								<li>Productos</li>
								<li>Salir</li>
							</ul>
					</div>
				</div>
		<div class='col-md-10 '>
			<center><h1  style="margin-left: 15px; font-family: 'Molle'; background-color: #76D7C4">Bitácora</h1></center>
			<br>
				<div style="text-align:center;">
					<table class="table table-responsive" border="1" >
						 <thead style="background-color: #76D7C4; margin: 0 auto;">
							<td><b>Codigo</b></td>
							<td><b>Nombre</b></td>
							<td><b>Tabla</b></td>
							<td><b>Acción</b></td>
                            <td><b>Fecha</b></td>
						 </thead>
						<?php
							$sql = "SELECT * FROM bitacora";
							$result = pg_query($con,$sql) or die("Error en la consulta");
							while($mostrar = pg_fetch_array($result)){
						?>
						<tr style="background-color:white">
							<td><?php echo $mostrar['cod_bit']?></td>
								<td><?php echo $mostrar['nomb_d']?></td>
								<td><?php echo $mostrar['tabla']?></td>
								<td><?php echo $mostrar['accion']?></td>
                                <td><?php echo $mostrar['fecha']?></td>
							</tr>
							<?php
								}
							?>
					</table>
				</div>
			</br>
			</div>
			</div>
		</div>
		</div>
		<center>
			<a href="adminIndex.php"><input type="submit" value="Inicio" class="btn btn-primary"></a>
		</center>
		</body>
	</html>