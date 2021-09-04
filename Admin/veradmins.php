<?php 
	include("./../conexion.php");
	$con = conectar();
?>
<!DOCTYPE html>
	<html>
		<head><title>Productos</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		
		<body >
		</div>
			<center><h1>Administradores</h1></center>
			<br>
				<div style="text-align:center;">
					<table border="1" style="margin: 0 auto;" >
						<tr>
							<td>User</td>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>Dirección</td>
                            <td>Teléfono</td>
                            <td>Correo</td>
						</tr>
						<?php
							$sql = "SELECT * FROM usuarios u join personas p on p.nomb_us=u.nomb_us WHERE tipo = 'A'";
							$result = pg_query($con,$sql) or die("Error en la consulta");
							while($mostrar = pg_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $mostrar['nomb_us']?></td>
								<td><?php echo $mostrar['nomb_pers']?></td>
								<td><?php echo $mostrar['apel_pers']?></td>
								<td><?php echo $mostrar['dir_pers']?></td>
                                <td><?php echo $mostrar['tel_pers']?></td>
                                <td><?php echo $mostrar['correo']?></td>
							</tr>
							<?php
								}
							?>
					</table>
				</div>
			</br>
		</div>
		<center>
			<a href="adminIndex.php"><input type="submit" value="Volver" class="btn btn-primary"></a>
			<a href="elimadmin.php"><input type="submit" value="Eliminar Administrador" class="btn btn-primary"></a>
		</center>
		</body>
	</html>
		