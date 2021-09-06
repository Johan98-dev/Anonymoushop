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
			<center><h1>Productos</h1></center>
			<br>
				<div style="text-align:center;">
					<table border="1" style="margin: 0 auto;" >
						<tr>
							<td>Codigo</td>
							<td>Nombre</td>
							<td>Precio</td>
							<td>Categoría</td>
						</tr>
						<?php
							$sql = "SELECT * FROM articulos a join  categorias c on c.cod_cat = a.cod_cat";
							$result = pg_query($con,$sql) or die("Error en la consulta");
							while($mostrar = pg_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $mostrar['cod_art']?></td>
								<td><?php echo $mostrar['nomb_art']?></td>
								<td><?php echo $mostrar['precio']?></td>
								<td><?php echo $mostrar['cod_cat']?></td>
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
			<a href="registrarProv.php"><input type="submit" value="Agregar Productos" class="btn btn-primary"></a>
			<a href="actualizarArt.php"><input type="submit" value="Actualizar el precio" class="btn btn-primary"></a>
		</center>
		</body>
	</html>
		