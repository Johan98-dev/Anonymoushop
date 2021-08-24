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
					<label for="email">Email </label>
					<input type="text" name="email" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label for="nombre">Tel </label>
					<input type="text" name="tel" class="form-control" id="nombre" >
				</div>
                <div class="form-group">
					<label for="nombre">dirección </label>
					<input type="text" name="direccion" class="form-control" id="direccion" >
				</div>
                <div class="form-group">
					<label for="codigo">User </label>
					<input type="text" name="nom_us" class="form-control" id="nom_us" >
				</div>
                <div class="form-group">
					<label for="contraseña">Password </label>
					<input type="text" name="contra_us" class="form-control" id="contra_us" >
				</div>

				<center>
					<input type="submit" value="Añadir" class="btn btn-primary" name= "btn_añadir">
				</center>

		 	 </form>
			
		    <?php
                $codigo = "";
				$nombre = "";
				$apellido = "";
				$email = "";
				if(isset($_POST['btn_añadir'])){
					$codigo = $_POST['codigo'];
					$nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$email = $_POST['email'];
					if($nombre=="" || $apellido=="" || $email=="" || $codigo==""){
						echo "Los campos son obligatorios por favor";
					}else{
						$existe = 0;
						$resultados = pg_query($con,"SELECT * FROM prueba1 WHERE codigo = '$codigo'");
						while($mostrar = pg_fetch_array($resultados)){
							$existe++;
						}
						if($existe==0){ 
                            $resultados = pg_query($con,"SELECT * FROM prueba1 WHERE email = '$email'");
                            while($mostrar = pg_fetch_array($resultados)){
                                $existe++;
                            }
                            if($existe==0){
								if(strlen($codigo)>10){
									echo "El codigo es demasiado largo, por favor digitelo nuevamente"."<br>";
									echo "Recuerde no debe ser mayor a 10 digitos";
								}else{
									pg_query($con, "INSERT INTO prueba1 (codigo,nombre,apelido,email) values ('$codigo','$nombre','$apellido', '$email')");
									echo "Registro Exitoso";
								}
                            }else{
                                echo "Este email ya esta registrada";
                            }
						}else{
							echo "Este codigo ya esta registrado";
						}

					}
					
				}
			?>
			<center>
				<a href="inicio.php"><input type="submit" value="Volver" class="btn btn-primary"></a>
			</center>
		</body>
	</html>