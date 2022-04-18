<?php
	require_once "../controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: login.php?error=2");
	}

	$db = db::getDBConnection();

	if (isset($_GET['card'])) {
	    print("borrar action: ".$_GET['card']);
		$Respuesta = $db->deleteCard($_GET['card']);
	}
	
	header("Location: ../tabla.php");

?>
