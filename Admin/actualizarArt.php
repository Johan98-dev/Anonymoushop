<?php 
	include("./../conexion.php");
	$con = conectar();
?>
<!DOCTYPE html>
	<html>
		<head><title>Actualizar Artículos</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		<body bgcolor="808000">
		  <div class="row"> 
		  	<div class="col-md-4"></div>
  			
			<div class="col-md-4">

    		<center><h1>Actualizar Artículos</h1></center>

    		<form method="POST" action="actualizarArt.php" >
			    <div class="form-group">
					<label for="cod_art">Cod </label>
					<input type="text" name="cod_art" class="form-control" id="cod_art" >
				</div>

				<div class="form-group">
					<label for="precio">Precio </label>
					<input type="text" name="precio" class="form-control" id="precio" >
				</div>

				<center>
					<input type="submit" value="Actualizar" class="btn btn-primary" name= "btn_añadir">
				</center>

		 	 </form>
			
		    <?php
				$precio = "";
				$cod_art = "";
				if(isset($_POST['btn_añadir'])){
                    $precio = $_POST['precio'];
					$cod_art = $_POST['cod_art'];
					if($precio < 0 || $cod_art == "" ){
						echo "El cod es obligatorio y el precio debe ser un valor positivo*";
					} else{
                           
								pg_query($con, " UPDATE articulos Set precio='$precio' Where cod_art='$cod_art'");
							    echo "Actualización Exitosa";
							
						}

					}
			?>
			<center>
				<a href="adminIndex.php"><input type="submit" value="Volver" class="btn btn-primary"></a>
			</center>
		</body>
	</html>