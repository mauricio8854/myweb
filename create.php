<?php
	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: login.php?error=2");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crear</title>
	<style type="text/css">
		p.error{
			font-size: 8px;
			color: red;
		}
	</style>
</head>
<body>
	<header>
		<h1>Nuevo (CREATE)</h1>
		<h3>Bienvenido <?php print($_SESSION['user']);?></h3>
		<a href="logout.php">Cerrar sesion</a>

		<nav>
			<ul>
				<li><a href="principal.php">Inicio</a></li>
			</ul>
		</nav>
	</header>
	<section>
		<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				print("<p class='error'>No se logró guardar el nuevo usuario. Verifique la información</p>");
			}
		}
		?>

		<form action="crud/create.php" enctype="multipart/form-data" method="POST">
			<label for="name">Usuario:</label><br><input type="text" name="usuario" required><br>
			<label for="lname">Contraseña:</label><br><input type="text" name="password" required><br>
			<label for="lname">Nombre:</label><br><input type="text" name="nombre" required><br>
			<label for="lname">Tipo de usuario:</label><br><input type="text" name="tipo_usuario" required><br>
			<label for="lname">Ahorros:</label><br><input type="number" name="ahorros" required><br>
			<label for="lname">Créditos:</label><br><input type="number" name="creditos" required><br>
			<label for="lname">Aportes:</label><br><input type="number" name="aportes" required><br>
			<label for="lname">Beneficios:</label><br><input type="number" name="beneficios" required><br>
			
			<input type="submit" value="Insertar">
		</form>
	</section>


</body>
</html>