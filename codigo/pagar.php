<?php

	session_start();

	require 'base.php';

	if(isset($_SESSION['user_id'])) {
		$records = $conn->prepare("SELECT * FROM tarjeta WHERE id = :id");
		$records->bindParam(':id',$_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		if(count($results) > 0){
			$user = $results;
		}
		$id=$user['id'];
		$pago=500;
		if($user['monto']>=$pago){
			$mon = $user['monto'] - $pago;
			$cuo = 'PAGADA';
		}
	}
	$sql1 = "UPDATE usuarios SET cuota = '$cuo' WHERE id ='$id'";
	$sql2 = "UPDATE tarjeta SET monto = '$mon' WHERE id ='$id'";

	if($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE){
	echo "<script>alert('No se pudieron Actualizar los datos'); window.history.go(-1);</script>";
}else{
	echo "<script>alert('Pago Realizado'); window.location='/taxi/vperfil.php';</script>";
		}	
?>