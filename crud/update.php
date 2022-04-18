<?php
	require_once "../controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: login.php?error=2");
	}

	$db = db::getDBConnection();
		}

	$Respuesta = $db->updateCard($_POST['card'],$_POST['password'],$_POST['nombre'],$_POST['tipo_usuario'],$_POST['ahorros'],$_POST['creditos'],$_POST['aportes'],$_POST['beneficios']);

	if(!$Respuesta){
		header("Location: ../update.php?card=".$_POST['nombre']."&error=1");
	}else {
		header("Location: ../principal.php");
	}
?>
