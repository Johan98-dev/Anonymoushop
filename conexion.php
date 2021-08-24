<?php 
	function conectar(){
		$conn_string = "host=ec2-52-203-74-38.compute-1.amazonaws.com port=5432 dbname=d7oqgl83bu9cuh user=fxkvnqgytipsea password= f0a705e340b75f7b50a0e03a7e5a7707f763cf29ea552a91a5924c47a1ba6f10";
		$con = pg_connect($conn_string) or die ("Error al conectar".pg_error());
		return $con;
	}
?>