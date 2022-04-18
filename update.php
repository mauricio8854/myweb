<?php
	require_once "./controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ejemplo6 - PHP: Sesion</title>
	<style type="text/css">
		p.error{
			font-size: 8px;
			color: red;
		}
	</style>
</head>
<body>
	<header>
		<h1>Actualizar (UPDATE)</h1>
		<h3>Bienvenido <?php print($_SESSION['user']);?></h3>
		<a href="logout.php">Cerrar sesion</a>

		<nav>
			<ul>
				<li><a href="inicio.php">Inicio</a></li>
			</ul>
		</nav>
	</header>
	<section>
		<?php
		if(isset($_GET['error'])){
			if($_GET['error']==1){
				print("<p class='error'>No se logró actualizar la tarjeta. Verifique la información</p>");
			}
		}
		?>

		<form action="crud/update.php" enctype="multipart/form-data" method="POST">
			<?php
				$db = db::getDBConnection();
				$Respuesta = $db->getCard($_GET['card']);
				while ($Card = $Respuesta->fetch_assoc()) {
				?>
			<label for="name">Nombre:</label><br><input type="text" name="card" value="<?php print($Card['nombre'])?>" required hidden><br>
			<label for="name">Nombre:</label><br><input type="text" name="nombre" value="<?php print($Card['nombre'])?>" required><br>
			<label for="lname">Descripcion:</label><br><input type="text" name="descripcion" value="<?php print($Card['descripcion'])?>" required><br>
			<label for="lname">Precio:</label><br><input type="number" name="precio" value="<?php print($Card['precio'])?>" required><br>
			<img src="<?php print($Card['imagen'])?>" width=200><br>
			<label for="lname">Imagen:</label><br><input type="file" name="imagen"><br><br>
				<?php }?>
			<input type="submit" value="Actualizar">

		</form>
	</section>


</body>
</html>