<?php

	session_start();

	require 'base.php';

	if(isset($_SESSION['user_id'])) {
		$records = $conn->prepare("SELECT id, nombre, num, mes, anio, cvv FROM tarjeta WHERE id = :id");
		$records->bindParam(':id',$_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);
		$user = $results;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingresar</title>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="estilos/css/vep.css">
	<link rel="stylesheet" href="estilos/css/Re.css">
</head>
<body>
	<?php if(!empty($user)): ?>
		<div id="principal">
		<div id="nom">
		<br>NOMBRE: <?=$user['nombre']?>
		</div>
		<div id="email">
		<br>TARJETA: <?=$user['num']?>
		</div>
		<div id="cumple">
		<br>MES: <?=$user['mes']?>
		</div>
		<div id="taxi">
		<br>AÑO: <?=$user['anio']?>
		</div>
		<div id="per">
		<a href="perfil.php">Volver</a>
		</div>
		<div id="edit">
		<a href="pagar.php">Pagar</a>
		</div>
		</div>
		<?php else: ?>		
<div id="titulo">
 <h1>No has Registrado una tarjeta</h1>
</div>
<div id="principal">	
<div id="per">
 <a href="pago.php">Registrar</a>
</div>
<div id="per">
		<a href="perfil.php">Volver</a>
		</div>
</div>
<?php endif; ?>
</body>
</html>