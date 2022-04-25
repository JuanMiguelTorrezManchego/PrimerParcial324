<?php
$id ='';
session_start();
require_once "../conexion.php";
$id = $_SESSION["idUser"];
$query ="";
$query = mysqli_query($conection,"select * from persona where ci = '$id'");
$result = mysqli_fetch_array($query);
$nombrecompleto = $result['nombrecompleto'];
$departamento = $result['departamento'];
$fechanacimiento = $result['fechanacimiento'];
$d='';
if ($id =='111134') {
	$d = 'true';
}else{
	$d='';
}




//pregunta 4
$query1 ="";
$query1 = mysqli_query($conection,"select * from inscripcion where ciestudiante = '$id'");


//pregunta 5
$query2 ="";
$query2 = mysqli_query($conection,"SELECT tp.departamento, ti.nota1 , ti.nota2, ti.nota3, ti.promedio
FROM persona tp, inscripcion ti WHERE ti.ciestudiante = tp.ci");

// print_r($query);

// function nota($dep , $tn, $query){
// 	$nota=0;
// 	$cont = 0;
// 	while ($fila=mysqli_fetch_array($query)){
// 		echo $dep;
// 		if($fila["departamento"] == $dep){
// 			$nota += $fila["$tn"];
// 			$cont++;
// 		}
// 	}
// 	echo $nota;

// 	if ($cont == 0) return 0;
// 	return $nota/$cont;
// }
// echo nota('02','nota1', $query);

?>


<!DOCTYPE html>
<html>
<head>
	<title>SISTEMA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="../estilos/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header class="header">
		<h1>SISTEMA DE CALIFICACIONES</h1>
		<h4><? echo $_SESSION['usuario']; ?> </h4>
		<a href="salir.php">salir</a>
	</header>
	<div>
		<h2>Bienvenido</h2>
		<h3><?php if($d!=''){echo "Director ";} echo $nombrecompleto;?> </h3>
	</div>
	<div <?php if($d!=''){ ?> style="display:none;" <?php   } ?> >
		<table border="1px" >
			<tr>
				<td>Materia</td>
				<td>Nota 1</td>
				<td>Nota 2</td>
				<td>Nota 3</td>
				<td>promedio</td>
			</tr>
			<?php
			while ($fila=mysqli_fetch_array($query1)){
				

				echo "<tr>";
				echo "<td>".$fila ["sigla"]."</td>";
				
				echo "<td>".$fila ["nota1"]."</td>";
				
				echo "<td>".$fila ["nota2"]."</td>";
				
				echo "<td>".$fila ["nota3"]."</td>";
				
				echo "<td>".$fila ["promedio"]."</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div> 
	<div <?php if($d==''){ ?> style="display:none;" <?php   } ?> >
		<table border="1px" >
			<tr>
				<td> </td>
				<td>SUCRE</td>
				<td>LA PAZ</td>
				<td>COCHABAMBA</td>
				<td>ORURO</td>
				<td>POTOSI</td>
				<td>TARIJA</td>
				<td>SANTA CRUZ</td>
				<td>BENI</td>
				<td>PANDO</td>
			</tr>
			<?php
			echo "<tr>";
			echo "<td>Nota 1</td>";
			$r = $query2;
			for ($i=0; $i <9 ; $i++) { 
				$p = '0'.strval($i+1); 
				$nota = 0;
				$cont = 0;
				$query2 ="";
				$query2 = mysqli_query($conection,"SELECT tp.departamento, ti.nota1 , ti.nota2, ti.nota3, ti.promedio
FROM persona tp, inscripcion ti WHERE ti.ciestudiante = tp.ci");
				while ($fila=mysqli_fetch_array($query2)){
					if($fila['departamento'] == $p){
						$nota += $fila['nota1'];
						$cont++;
					}
				}				
				if($cont !=0){
					echo "<td>".($nota/$cont)."</td>";	
				}else{
					echo "<td>0</td>";	
				}
			}
			echo "</tr>";
			echo "<tr>";
			echo "<td>Nota 2</td>";
			$r = $query2;
			for ($i=0; $i <9 ; $i++) { 
				$p = '0'.strval($i+1); 
				$nota = 0;
				$cont = 0;
				$query2 ="";
				$query2 = mysqli_query($conection,"SELECT tp.departamento, ti.nota1 , ti.nota2, ti.nota3, ti.promedio
FROM persona tp, inscripcion ti WHERE ti.ciestudiante = tp.ci");
				while ($fila=mysqli_fetch_array($query2)){
					if($fila['departamento'] == $p){
						$nota += $fila['nota2'];
						$cont++;
					}
				}				
				if($cont !=0){
					echo "<td>".($nota/$cont)."</td>";	
				}else{
					echo "<td>0</td>";	
				}
			}
			echo "</tr>";

			echo "</tr>";
			echo "<tr>";
			echo "<td>Nota 3</td>";
			$r = $query2;
			for ($i=0; $i <9 ; $i++) { 
				$p = '0'.strval($i+1); 
				$nota = 0;
				$cont = 0;
				$query2 ="";
				$query2 = mysqli_query($conection,"SELECT tp.departamento, ti.nota1 , ti.nota2, ti.nota3, ti.promedio
FROM persona tp, inscripcion ti WHERE ti.ciestudiante = tp.ci");
				while ($fila=mysqli_fetch_array($query2)){
					if($fila['departamento'] == $p){
						$nota += $fila['nota3'];
						$cont++;
					}
				}				
				if($cont !=0){
					echo "<td>".($nota/$cont)."</td>";	
				}else{
					echo "<td>0</td>";	
				}
			}
			echo "</tr>";

			echo "</tr>";
			echo "<tr>";
			echo "<td>Promedio</td>";
			$r = $query2;
			for ($i=0; $i <9 ; $i++) { 
				$p = '0'.strval($i+1); 
				$nota = 0;
				$cont = 0;
				$query2 ="";
				$query2 = mysqli_query($conection,"SELECT tp.departamento, ti.nota1 , ti.nota2, ti.nota3, ti.promedio
FROM persona tp, inscripcion ti WHERE ti.ciestudiante = tp.ci");
				while ($fila=mysqli_fetch_array($query2)){
					if($fila['departamento'] == $p){
						$nota += $fila['promedio'];
						$cont++;
					}
				}				
				if($cont !=0){
					echo "<td>".($nota/$cont)."</td>";	
				}else{
					echo "<td>0</td>";	
				}
			}
			echo "</tr>";
			?>
		</table>
	</div>
</body>
</html>
