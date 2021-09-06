<?php 
	include("./../conexion.php");
	$con = conectar();
?>
<!DOCTYPE html>
	<html>
		<head><title>Registrar Proveedor</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		<body bgcolor="808000">
		  <div class="row"> 
		  	<div class="col-md-4"></div>
  			
			<div class="col-md-4">

    		<center><h1>Registrar Proveedor</h1></center>

    		<form method="POST" action="registrarAdmin.php" >

				<div class="form-group">
					<label for="cod_prov">Cod </label>
					<input type="text" name="cod_prov" class="form-control" id="cod_prov" >
				</div>

				<div class="form-group">
					<label for="nomb_prov">Nombre </label>
					<input type="text" name="nomb_prov" class="form-control" id="nomb_prov">
				</div>
				<div class="form-group">
					<label for="tel_prov">Tel </label>
					<input type="text" name="tel_prov" class="form-control" id="tel_prov" >
				</div>
                <div class="form-group">
					<label for="dir_prov">Dirección </label>
					<input type="text" name="dir_prov" class="form-control" id="dir_prov" >
				</div>

				<center>
					<input type="submit" value="Añadir" class="btn btn-primary" name= "btn_añadir">
				</center>

		 	 </form>
			
		    <?php
                $cod_prov = "";
				$nomb_prov = "";
				$dir_prov = "";
				$tel_prov = "";
				if(isset($_POST['btn_añadir'])){
					$cod_prov = $_POST['cod_prov'];
				    $nomb_prov = $_POST['nomb_prov'];
                    $tel_prov = $_POST['tel_prov'];
			    	$dir_prov = $_POST['dir_prov'];
					if($cod_prov == "" || $nomb_prov == "" || $dir_prov == "" || $tel_prov == "" ){
						echo "Todos los campos son obligatorios*";
					} else{
						$existe = 0;
						$resultados = pg_query($con,"SELECT * FROM proveedores WHERE cod_prov = '$cod_prov'");
						while($mostrar = pg_fetch_array($resultados)){
							$existe++;
						}
						if($existe==0){ 
                            $resultados = pg_query($con,"SELECT * FROM provedores WHERE nomb_prov = '$nomb_prov'");
                            while($mostrar = pg_fetch_array($resultados)){
                                $existe++;
                            }
                            if($existe==0){
								if(strlen($cod_prov)>3){
									echo "El ID es demasiado largo, por favor digitelo nuevamente"."<br>";
									echo "Recuerde no debe ser mayor a 3 carácteres";
								}else{
									pg_query($con, "INSERT INTO proveedores (cod_prov, nomb_prov, tel_prov, dir_prov) values ('$cod_prov','$nomb_prov','$tel_prov', '$dir_prov')");
									echo "Registro Exitoso";
								}
                            }else{
                                echo "Este Proveedor ya está registrado";
                            }
						}else{
							echo "Este #Id ya está registrado";
						}

					}
					
				} 
			?>
			<center>
				<a href="adminIndex.php"><input type="submit" value="Volver" class="btn btn-primary"></a>
			</center>
		</body>
	</html>