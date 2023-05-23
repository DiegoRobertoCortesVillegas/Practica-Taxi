<?php

	session_start();

	require 'base.php';

	if(isset($_SESSION['user_id'])) {
		$records = $conn->prepare("SELECT id, nom, email, contra, cumple, taxi, cuota FROM usuarios WHERE id = :id");
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
	<link rel="stylesheet" href="estilos/css/vep.css">
</head>
<body>
	<?php if(!empty($user)): ?>
		<div id="principal">
		<div id="nom">
		<br>NOMBRE: <?=$user['nom']?>
		</div>
		<div id="email">
		<br>EMAIL: <?=$user['email']?>
		</div>
		<div id="cumple">
		<br>FECHA: <?=$user['cumple']?>
		</div>
		<div id="taxi">
		<br>TAXI: <?=$user['taxi']?>
		</div>
		<div id="taxi">
		<br>CUOTA: <?=$user['cuota']?>
		</div>
		<div id="per">
			<?php if($user['id']==18){?>
		<a href="perfilD.php">Volver</a>
			<?php }else{ ?>
		<a href="perfil.php">Volver</a>
			<?php }?>
		</div>
		<div id="edit">
		<a href="edit.php">Editar Perfil</a>
		</div>
		</div>
		<?php else: ?>
 <h1>Error</h1>
<?php endif; ?>
</body>
</html>