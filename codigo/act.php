<?php

	require ('base.php');

$id = $_POST['id'];
$nombre = $_POST['nom'];
$email = $_POST['email'];
$cumplea = $_POST['cumple'];
$tax = $_POST['taxi'];

$sql = "UPDATE usuarios SET nom = '$nombre', email = '$email', cumple = '$cumplea', taxi = '$tax' WHERE id = '$id'";
//$records = $conn->prepare($sql);
//$records->execute()

if($conn->query($sql) === FALSE){
	echo "<script>alert('No se pudieron Actualizar los datos'); window.history.go(-1);</script>";
}else{
	echo "<script>alert('Datos Actualizados'); window.location='/taxi/vperfil.php';</script>";
		}	
?>