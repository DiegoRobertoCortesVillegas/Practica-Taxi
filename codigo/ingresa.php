<?php

	session_start();

	if(isset($_SESSION['user_id'])) {
		header('Location: /taxi');
	}

	require 'base.php';

	if (!empty($_POST['email']) && !empty($_POST['contra'])){
		$records = $conn->prepare('SELECT id, nom, email, contra, cumple, taxi FROM usuarios WHERE email = :email');
		$records->bindParam(':email',$_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		//if (is_countable($results) && count($results) > 0 && password_verify($_POST['contra'], $results['contra'])){
		if ($_POST['contra'] == $results['contra']) {
			$_SESSION['user_id'] = $results['id'];
			if($results['id']==18){
				header('Location: /taxi/perfilD.php');
			}else{
				header('Location: /taxi/perfil.php');
			}
		}else{
			$message = "Lo siento, tus credenciales no coinciden";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingresar</title>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<link rel="stylesheet" href="estilos/css/esti.css">
</head>
<body>



<?php if (!empty($message)) :?>
	<p><?=$message?></p>
<?php endif;?>

	<div class="modal-dialog text-center">
        <div class="col-sm-12 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
				<h1>Ingresar</h1>
                </div>
                <form class="col-12" action="ingresa.php" method="post">
                    <div class="form-group" id="user-group">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" name="email" placeholder="Ingresa tu Mail">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" name="contra" placeholder="Ingresa tu Contraseña">
                    </div>
					<p>¿No tienes una cuenta?<a class="link" href="registra.php"> Registrarse</a></p>
                    <input type="submit" value="Ingresar">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>