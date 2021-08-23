<?php
    
        function conectar_PostgreSQL( $usuario, $pass, $host, $bd )
        {
             $conexion = pg_connect( "user=".$usuario."fxkvnqgytipsea".
                                    "password=".$pass."f0a705e340b75f7b50a0e03a7e5a7707f763cf29ea552a91a5924c47a1ba6f10".
                                    "host=".$host."ec2-52-203-74-38.compute-1.amazonaws.com".
                                    "dbname=".$bd. "d7oqgl83bu9cuh"
                                   ) or die( "Error al conectar: ".pg_last_error() );
            return $conexion;
        }
?>