<?php
	require_once "../controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: login.php?error=2");
	}

	$db = db::getDBConnection();
	$Respuesta = $db->createCard($_POST['usuario'],$_POST['password'],$_POST['nombre'],$_POST['tipo_usuario'],$_POST['ahorros'],$_POST['creditos'],$_POST['aportes'],$_POST['beneficios']);
	if(!$Respuesta){
		header("Location: ../create.php?error=1");
	}else {
		header("Location: ../tabla.php");
	}
?>
