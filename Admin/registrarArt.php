<?php 
	include("./../conexion.php");
	$con = conectar();
?>
<!DOCTYPE html>
	<html>
		<head><title>Registrar Artículos</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		<body bgcolor="808000">
		  <div class="row"> 
		  	<div class="col-md-4"></div>
  			
			<div class="col-md-4">

    		<center><h1>Registrar Artículos</h1></center>

    		<form method="POST" action="registrarArt.php" >

				<div class="form-group">
					<label for="cod_art">Cod </label>
					<input type="text" name="cod_art" class="form-control" id="cod_art" >
				</div>

				<div class="form-group">
					<label for="nomb_art">Nombre </label>
					<input type="text" name="nomb_art" class="form-control" id="nomb_art">
				</div>
				<div class="form-group">
					<label for="precio">Precio </label>
					<input type="text" name="precio" class="form-control" id="precio" >
				</div>
                <div class="form-group">
					<label for="stock">Stock </label>
					<input type="text" name="stock" class="form-control" id="stock" >
				</div>
				<div class="form-group">
					<label for="cod_cat">Cod_Categoría </label>
					<input type="text" name="cod_cat" class="form-control" id="cod_cat" >
				</div>
				<div class="form-group">
					<label for="cod_prov">Cod_Proveedor </label>
					<input type="text" name="cod_prov" class="form-control" id="cod_prov" >
				</div>

				<center>
					<input type="submit" value="Añadir" class="btn btn-primary" name= "btn_añadir">
				</center>

		 	 </form>
			
		    <?php
                $cod_art = "";
				$nomb_art = "";
				$precio = "";
				$stock = "";
				$cod_cat = "";
				$cod_prov = "";
				if(isset($_POST['btn_añadir'])){
					$cod_art = $_POST['cod_art'];
				    $nomb_art = $_POST['nomb_art'];
                    $precio = $_POST['precio'];
					$stock = $_POST['stock'];
                    $cod_cat = $_POST['cod_cat'];
			    	$cod_prov = $_POST['cod_prov'];
					if($cod_prov == "" || $nomb_art == "" || $cod_art == "" || $precio == "" || $stock == "" || $cod_cat == "" ){
						echo "Todos los campos son obligatorios*";
					} else{
						$existe = 0;
						$resultados = pg_query($con,"SELECT * FROM articulos WHERE cod_art = '$cod_art'");
						while($mostrar = pg_fetch_array($resultados)){
							$existe++;
						}
						if($existe==0){ 
                            $resultados = pg_query($con,"SELECT * FROM articulos WHERE nomb_art = '$nomb_art'");
                            while($mostrar = pg_fetch_array($resultados)){
                                $existe++;
                            }
                            if($existe==0){
								if(strlen($cod_art)>3){
									echo "El Cod es demasiado largo, por favor digitelo nuevamente"."<br>";
									echo "Recuerde no debe ser mayor a 3 carácteres";
								}else{
									pg_query($con, "INSERT INTO articulos (cod_art, nomb_art, precio, stock, cod_cat, cod_prov) values ('$cod_art','$nomb_art','$precio', '$stock', '$cod_cat', '$cod_prov')");
									echo "Registro Exitoso";
								}
                            }else{
                                echo "Este Artículo ya está registrado";
                            }
						}else{
							echo "Este Cod ya está registrado";
						}

					}
					
				} 
			?>
			<center>
				<a href="adminIndex.php"><input type="submit" value="Volver" class="btn btn-primary"></a>
			</center>
		</body>
	</html>