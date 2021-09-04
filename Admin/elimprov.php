<?php 
	include("./../conexion.php");
	$con = conectar();
?>
<!DOCTYPE html>
	<html>
		<head><title>Eliminar</title>
			
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		<body bgcolor="808000">
		  <div class="row"> 
		  	<div class="col-md-4"></div>
  			
			<div class="col-md-4">

    		<center><h1>Eliminar</h1></center>

    		<form method="POST" action="elimprodc.php" >

				<div class="form-group">
					<label for="cod_prov">Codigo </label>
					<input type="text" name="cod_prov" class="form-control" id="cod_prov" >
				</div>
				
				<center>
				<input type="submit" value="Eliminar" class="btn btn-primary" name= "btn_eliminar">
				</center>

		 	</form>
			
		    <?php
                $cod_prov="";
				if(isset($_POST['btn_eliminar'])){
					$cod_art = $_POST['cod_prov'];
					if($cod_art==""){
						echo "El campo es obligatorio";
					}else{
						$existe = 0;
						$resultados = pg_query($con,"SELECT * FROM proveedores WHERE cod_prov = '$cod_prov'");
						while($mostrar = pg_fetch_array($resultados)){
							$existe++;
						}
						if($existe==0){
							echo "No existe este registro";
						}else{
							$_DELETE_SQL =  "DELETE FROM articulos WHERE cod_prov = '$cod_prov'";
                            pg_query($con,$_DELETE_SQL);
                            echo "El registro ha sido eliminado"; 
						}

					}
					
				}
			?>
		<center>
		<a href="adminIndex.php">Volver</a>
		</center>
		</body>
	</html>


	