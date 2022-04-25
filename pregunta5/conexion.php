<?php
$host = 'localhost';
$user = 'miki';
$password = '123456';
$db = 'mibasemigueltorrezmanchego';
$conection = @mysqli_connect($host, $user, $password, $db);
if(!$conection){
	echo "Error en la conexion";
}
?>