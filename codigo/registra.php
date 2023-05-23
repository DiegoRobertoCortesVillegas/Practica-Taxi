<?php

	require 'base.php';

	$message = '';

	if (!empty($_POST['email']) && !empty($_POST['contra'])){
		$sql = "INSERT INTO usuarios (nom, email, contra, cumple, taxi) VALUES (:nom, :email, :contra, :cumple, :taxi)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':nom', $_POST['nom']);
		$stmt->bindParam(':email', $_POST['email']);
		$stmt->bindParam(':contra', $_POST['contra']);
		//$contra = password_hash($_POST['contra'], PASSWORD_BCRYPT);
		//$stmt->bindParam(':contra', $contra);
		$stmt->bindParam(':cumple', $_POST['cumple']);
		$stmt->bindParam(':taxi', $_POST['taxi']);

		if ($stmt->execute()) {
			$message = 'Usuario registrado correctamente';
			header('Location: /taxi/ingresa.php');
		}else {
			$message = 'Lo siento, no se pudo registrar el usuario';
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<link rel="stylesheet" href="estilos/css/esti.css">
</head>
<body>
	<?php if(!empty($message)): ?>
		<p> <?= $message ?> </p>
	<?php endif; ?>

<!---<h1>Registrate</h1>
<span> or <a href="Ingresa.php">Ingresa</a></span>

	<form action="registra.php" method="post">
		<input type="text" name="nom" placeholder="Ingresa tu Nombre">
		<input type="email" name="email" placeholder="Ingresa tu Mail">
		<input type="password" name="contra" placeholder="Ingresa tu Contraseña">
		<input type="date" name="cumple" placeholder="Ingresa tu Fecha de Nacimiento">
		<input type="text" name="genero" placeholder="Ingresa tu genero">
		<input type="submit" value="Enviar">

	</form>
--->
<div class="modal-dialog text-center">
        <div class="col-sm-12 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <h1>Registrate</h1>
                </div>
                <form class="col-12" action="registra.php" method="post">
                    <div class="form-group" id="user-group">
                        <i class="fas fa-user icon"></i>
                        <input type="text" name="nom" placeholder="Ingresa tu Nombre">
                    </div>
                    <div class="form-group" id="user-group">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" name="email" placeholder="Ingresa tu Mail">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" name="contra" placeholder="Ingresa tu Contraseña">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <i class="fas fa-calendar-alt icon"></i>
                        <input type="date" name="cumple" placeholder="Ingresa tu Fecha de Nacimiento">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <i class="fas fa-transgender-alt icon"></i>
                        <input type="text" name="taxi" placeholder="Ingresa tus placas de taxi">
                    </div>
					<p>¿Ya tienes una cuenta?<a class="link" href="Ingresa.php"> Iniciar Sesion</a></p>
                    <input type="submit" value="Registrarme">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>