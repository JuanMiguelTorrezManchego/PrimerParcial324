<?php
include "conexion.php";
$pdo = new Conexion();
if ($_SERVER["REQUEST_METHOD"]=="GET")
{
	if (isset($_GET["ci"]))
	{
		$sql = $pdo->prepare("select * from persona where ci=:ci");
		$sql->bindValue(':ci',$_GET["ci"]);
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 existen datos");
		echo json_encode($sql->fetchAll());
		exit;
	}
	else
	{
		$sql = $pdo->prepare("select * from persona");
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 existen datos");
		echo json_encode($sql->fetchAll());
		exit;
	}
	header("HTTP/1.1 400 Requerimiento inexistente");
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
	$s="insert into persona(ci,nombrecompleto,fechanacimiento,departamento)";
	$s.=" values (:ci,:nombrecompleto,:fechanacimiento,:departamento)";
	$sql = $pdo->prepare($s);
	$sql->bindValue(':ci',$_GET["ci"]);
	$sql->bindValue(':nombrecompleto',$_GET["nombrecompleto"]);
	$sql->bindValue(':fechanacimiento',$_GET["fechanacimiento"]);
	$sql->bindValue(':departamento',$_GET["departamento"]);
	$sql->execute();
	$state=$pdo->lastInsertId();
	if ($state)
	{
		header("HTTP/1.1 200 insercion correcta");
		echo json_encode($state);
		exit;
	}
}
if ($_SERVER["REQUEST_METHOD"]=="PUT")
{
	$s="update persona set nombrecompleto=:nombrecompleto, fechanacimiento=:fechanacimiento, departamento=:departamento WHERE ci=:ci";
	
	$sql = $pdo->prepare($s);
	$sql->bindValue(':nombrecompleto',$_GET["nombrecompleto"]);
	$sql->bindValue(':fechanacimiento',$_GET["fechanacimiento"]);
	$sql->bindValue(':departamento',$_GET["departamento"]);
	$sql->bindValue(':ci',$_GET["ci"]);
	$sql->execute();
	$state=$pdo->lastInsertId();
	if ($state)
	{
		header("HTTP/1.1 200 insercion correcta");
		echo json_encode($state);
		exit;
	}
}
if ($_SERVER["REQUEST_METHOD"]=="DELETE")
{
	$sql = $pdo->prepare("delete from persona where ci=:ci");
	$sql->bindValue(':ci',$_GET["ci"]);
	$sql->execute();
	header("HTTP/1.1 200 borrado");
	exit;
}
?>