<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])){
	header('location: sistema/');
}else{
	if (!empty($_POST)) {
		if (empty($_POST['usuario']) || empty($_POST['clave'])){
			$alert = 'Ingrese su Usuario y Contrasena';
		}else{
			require_once "conexion.php";
			$user = $_POST['usuario'];
			$pass = $_POST['clave'];

			$query = mysqli_query($conection,"select * from acceso where usuario = '$user' and contrasena = '$pass'");
			$result = mysqli_num_rows($query);
			if($result > 0){
				$data = mysqli_fetch_array($query);
				session_start();
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['ci'];
				$_SESSION['usuario'] = $data['usuario'];
				
				header('location: sistema/');
			}else{
				$alert = 'El usuario y la contrasena son incorrectos';
			}

		}
	
	}	
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>SISTEMA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="estilos/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="login">
		
		<form action="" method="POST">
			<h1>INICIAR SESION</h1>
			<h3>Usuario</h3>
			<input type="text" name="usuario">
			<h3>Contrasena</h3>
			<input type="password" name="clave">
			<div><?php echo isset($alert) ? $alert: '';?></div>
			<br>
			<input type="submit" value="ingresar">
		</form>
	</div>
	
</body>
</html>
