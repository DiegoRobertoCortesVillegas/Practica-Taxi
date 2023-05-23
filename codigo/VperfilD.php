<?php

	session_start();

	require 'base.php';

	if(isset($_SESSION['user_id'])) {
		$records = $conn->prepare("SELECT * FROM dir");
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		if(count($results) > 0){
			$user = $results;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingresar</title>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="estilos/css/vep.css">
</head>
<body>
	<?php if(!empty($user)): ?>

		<br>Perfil del Dirigente: <?=$user['name']?>
		<div id="principal">
		<div id="nom">
		<br>NOMBRE: <?=$user['name']?>
		</div>
		<div id="email">
		<br>CUENTA: <?=$user['cuenta']?>
		</div>
		<div id="cumple">
		<br>BANCO: <?=$user['banco']?>
		</div>
		<div id="taxi">
		<br>CUOTA: <?=$user['cuota']?>
		</div>
		<div id="taxi">
		<br>TELEFONO: <?=$user['telefono']?>
		</div>
		<div id="edit">
		<a href="perfil.php">Volver</a>
		</div>
		</div>

		<?php else: ?>
 <h1>Error</h1>
<?php endif; ?>
</body>
</html>