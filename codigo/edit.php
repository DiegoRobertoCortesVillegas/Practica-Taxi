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
	<title>Editar Datos</title>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="estilos/css/vep.css">
</head>
<body>
	<form class="col-12" action="act.php" method="post">
	<?php if(!empty($user)): ?>

		<input type="hidden" value="<?=$user['id']?>" name="id">
		<div id="principal">
		<div id="nom">
		<br>NOMBRE: <input type="text" value="<?=$user['nom']?>" name="nom">
		</div>
		<div id="email">
		<br>EMAIL: <input type="text" value="<?=$user['email']?>" name="email">
		</div>
		<div id="cumple">
		<br>FECHA: <input type="text" value="<?=$user['cumple']?>" name="cumple">
		</div>
		<div id="taxi">
		<br>TAXI: <input type="text" value="<?=$user['taxi']?>" name="taxi">
		</div>
		<input type="submit" value="Actualizar">
	</form>
		<div id="edit">
		<a href="Vperfil.php">Volver</a>
		</div>
		</div>
		<?php else: ?>
 <h1>Error</h1>
<?php endif; ?>
</body>
</html>