<?php 
	include("./../conexion.php");
	$con = conectar();
?>
<!DOCTYPE html>
	<html>
		<head><title>Bitácora</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		
		<body >
		</div>
			<center><h1>Bitácora</h1></center>
			<br>
				<div style="text-align:center;">
					<table border="1" style="margin: 0 auto;" >
						<tr>
							<td>Codigo</td>
							<td>Nombre</td>
							<td>Tabla</td>
							<td>Acción</td>
                            <td>Fecha</td>
						</tr>
						<?php
							$sql = "SELECT * FROM bitacora";
							$result = pg_query($con,$sql) or die("Error en la consulta");
							while($mostrar = pg_fetch_array($result)){
						?>
						<tr>
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
		<center>
			<a href="adminIndex.php"><input type="submit" value="Inicio" class="btn btn-primary"></a>
		</center>
		</body>
	</html>