<?php 
	include("conexion.php");
	$con = conectar();
?>
<!DOCTYPE html>
	<html>
		<head><title>Login</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		</head>
		<body bgcolor="808000">
		  <div class="row"> 
		  	<div class="col-md-4"></div>
  			
			<div class="col-md-4">

    		<center><h1>Iniciar sesión</h1></center>

    		<form method="POST" action="loginC.php" >
	
                <div class="form-group">
					<label for="nomb_us">User </label>
					<input type="text" name="nomb_us" class="form-control" id="nomb_us" >
				</div>
                <div class="form-group">
					<label for="contra_us">Password </label>
					<input type="password" name="contra_us" class="form-control" id="contra_us" >
				</div>

				<center>
					<input type="submit" value="Login" class="btn btn-primary" name= "btn_login">
				</center>

		 	 </form>
			
		    <?php
                $nomb_us = ""; 
				$contra_us = "";
				if(isset($_POST['btn_login'])){
					session_start();
				    $nomb_us = $_POST['nomb_us']; 
				    $contra_us = $_POST['contra_us'];
					if($nomb_us == "" || $contra_us == ""){
						echo "Todos los campos son obligatorios*";
					}else{
						$resultados = pg_query($con,"SELECT * FROM usuarios WHERE nomb_us = '$nomb_us' AND contra_us = '$contra_us'");	
                        if($datos= pg_fetch_array($resultados)){
                            if($contra_us==$datos['contra_us'] && $nomb_us==$datos['nomb_us']){                     
                                if($datos['tipo']=='A'){
                                    header("Location: Admin/adminIndex.php");
                                }
                                if($datos['tipo']=='C'){
                                    header("Location: Cliente/index.php");
                                }
                            }else{
                                echo "ERROR: Usuario y/o Contraseña incorrectos";
                            }
                        }    
                    } 
					$_SESSION["nomb_us"]=$nomb_us;   
                }		
			?>
			<center>
				<a href="inicio.php"><input type="submit" value="Inicio" class="btn btn-primary"></a>
			</center>
		</body>
	</html>