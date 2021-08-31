<?php 
	include("conexion.php");
	$con = conectar();
?>
<!DOCTYPE html>
	<html>
		<head><title>Registrar</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		<body bgcolor="808000">
		  <div class="row"> 
		  	<div class="col-md-4"></div>
  			
			<div class="col-md-4">

    		<center><h1>Registrar</h1></center>

    		<form method="POST" action="registrar.php" >

				<div class="form-group">
					<label for="nombre">Nombre(s) </label>
					<input type="text" name="nombre" class="form-control" id="nombre" >
				</div>

				<div class="form-group">
					<label for="apellido">Apellido(s) </label>
					<input type="text" name="apellido" class="form-control" id="apellido">
				</div>

				<div class="form-group">
					<label for="id_pers"># Identificación </label>
					<input type="text" name="id_pers" class="form-control" id="id_pers">
				</div>

				<div class="form-group">
					<label for="email">Email </label>
					<input type="text" name="email" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label for="tel">Tel </label>
					<input type="text" name="tel" class="form-control" id="tel" >
				</div>
                <div class="form-group">
					<label for="direccion">Dirección </label>
					<input type="text" name="direccion" class="form-control" id="direccion" >
				</div>
                <div class="form-group">
					<label for="nomb_us">User </label>
					<input type="text" name="nomb_us" class="form-control" id="nomb_us" >
				</div>
                <div class="form-group">
					<label for="contra_us">Password </label>
					<input type="password" name="contra_us" class="form-control" id="contra_us" >
				</div>

				<center>
					<input type="submit" value="Añadir" class="btn btn-primary" name= "btn_añadir">
				</center>

		 	 </form>
			
		    <?php
                $id_pers = "";
				$nomb_pers = "";
				$apel_pers = "";
				$dir_pers = "";
				$tel_pers = "";
				$correo = "";
				$nomb_us = ""; 
				$contra_us = "";
				$tipo = "C";
				if(isset($_POST['btn_añadir'])){
					$id_pers = $_POST['id_pers'];
				    $nomb_pers = $_POST['nombre'];
				    $apel_pers = $_POST['apellido'];
			    	$dir_pers = $_POST['direccion'];
				    $tel_pers = $_POST['tel'];
				    $correo = $_POST['email'];
				    $nomb_us = $_POST['nomb_us']; 
				    $contra_us = $_POST['contra_us'];
					if($id_pers == "" || $nomb_pers == "" || $apel_pers == "" || $dir_pers == "" ||	$tel_pers == "" || $correo == "" || $nomb_us == "" || $contra_us == ""){
						echo "Todos los campos son obligatorios*";
					}else{
						$existe = 0;
						$resultados = pg_query($con,"SELECT * FROM usuarios u join personas p on p.nomb_us=u.nomb_us WHERE id_pers = '$id_pers'");
						while($mostrar = pg_fetch_array($resultados)){
							$existe++;
						}
						if($existe==0){ 
                            $resultados = pg_query($con,"SELECT * FROM usuarios u join personas p on p.nomb_us=u.nomb_us WHERE nomb_us = '$nomb_us'");
                            while($mostrar = pg_fetch_array($resultados)){
                                $existe++;
                            }
                            if($existe==0){
								if(strlen($id_pers)>10){
									echo "El ID es demasiado largo, por favor digitelo nuevamente"."<br>";
									echo "Recuerde no debe ser mayor a 10 digitos";
								}else{
									pg_query($con, "INSERT INTO usuarios (nomb_us, contra_us, tipo) values ('$nomb_us','$contra_us','$tipo')");
									pg_query($con, "INSERT INTO personas (id_pers, nomb_pers, apel_pers, dir_pers, tel_pers, correo, nomb_us) values ('$id_pers','$nomb_pers','$apel_pers', '$dir_pers', '$tel_pers', '$correo', '$nomb_us')");
									echo "Registro Exitoso";
								}
                            }else{
                                echo "Este Usuario ya está registrado";
                            }
						}else{
							echo "Este #Id ya está registrado";
						}

					}
					
				}
			?>
			<center>
				<a href="inicio.php"><input type="submit" value="Volver" class="btn btn-primary"></a>
			</center>
		</body>
	</html>