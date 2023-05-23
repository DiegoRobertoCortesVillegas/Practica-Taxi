<?php

	session_start();

	require 'base.php';

	if(isset($_SESSION['user_id'])) {
		$records = $conn->prepare("SELECT id, nom, email, contra, cumple, taxi FROM usuarios WHERE id = :id");
		$records->bindParam(':id',$_SESSION['user_id']);
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
	<link rel="stylesheet" href="estilos/css/pe.css">
</head>
<body>
	<?php if(!empty($user)): ?>

		<div id="titulo">
		<p class="titu"><br>Bienvenido <?=$user['nom']?></p>
		</div>
		<div id="principal">
		<div id="per">
		<p class="titu"><a href="Vperfil.php">Visualizar Perfil</a></p>
		</div>
		<div id="perdi">
		<p class="titu"><a href="VperfilD.php">Visualizar Perfil del Dirigente</a></p>
		</div>
		<div id="pago">
		<p class="titu"><a href="rpago.php">Realizar Pago de Cuota</a></p>
		</div>
		<div id="cerrar">
		<p class="titu"><a href="cierra.php">Cerrar Sesion</a></p>
		</div>
		</div>

		<?php else: ?>
 <h1>Error</h1>
<?php endif; ?>
</body>
</html>