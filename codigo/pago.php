<?php

   session_start();

    require 'base.php';

    if(isset($_SESSION['user_id'])) {
        $sql = "INSERT INTO tarjeta (id, nombre, num, mes, anio, cvv, monto) VALUES (:id, :nom, :num, :mes, :anio, :cvv, :monto)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$_SESSION['user_id']);
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':num', $_POST['num']);
        $stmt->bindParam(':mes', $_POST['mes']);
        $stmt->bindParam(':anio', $_POST['anio']);
        $stmt->bindParam(':cvv', $_POST['cvv']);
        $stmt->bindParam(':monto', $_POST['monto']);

        if ($stmt->execute()) {
            $message = 'Tarjeta registrada correctamente';
            header('Location: /taxi/rpago.php');
        }else {
            $message = 'Lo siento, no se pudo registrar el usuario';
        }
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Realizar Pago</title>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<link rel="stylesheet" href="estilos/css/esti.css">
</head>
<body>
<div class="modal-dialog text-center">
        <div class="col-sm-12 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <h1>Realizar Pago</h1>
                </div>
                <form class="col-12" action="pago.php" method="post">
                    <div class="form-group" id="user-group">
                        <i class="fas fa-user icon"></i>
                        <input type="text" name="nom" placeholder="Ingresa tu Nombre">
                    </div>
                    <div class="form-group" id="user-group">
                        <i class="fas fa-id-card icon"></i>
                        <input type="text" name="num" placeholder="Ingresa tu numero de tarjeta">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <i class="fas fa-lock icon"></i>
                        <input style=" width: 80px;" type="number" name="mes" placeholder="mm">
                        <i class="fas fa-calendar-alt icon"></i>
                        <input style="width: 80px;" type="number" name="anio" placeholder="aa">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <i class="fas fa-credit-card icon"></i>
                        <input style="width: 100px;" type="number" name="cvv" placeholder="CVV">
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="hidden" name="monto" value="2000">
                    </div>
                    <input type="submit" value="Registrar">
                </form>
                <a href="perfil.php">Volver</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>