<?php
	$server = 'localhost:3305';
	$username = 'root';
	$password = '';
	$database = 'formulario';

	try{
		$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	}catch (PDOException $e) {
		die('Conexion fallida'.$e->getMessage());
	}
	
	?>