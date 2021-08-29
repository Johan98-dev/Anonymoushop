<?php 
	function conectar(){
		$conn_string = "host=ec2-52-87-107-83.compute-1.amazonaws.com port=5432 dbname=de7na2kqrbqcbj user= sddbmcdcdectye password= b7aab0f22460f5a734f5d000680974eb7fb48d03f30137beee9413ca37a1d284";
		$con = pg_connect($conn_string) or die ("Error al conectar".pg_error());
		return $con;
	}
?>