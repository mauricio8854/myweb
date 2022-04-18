<?php
	require_once "../controlador.php";

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
	<title>Consulta</title>
</head>
<body>
	<header>
		<h1>Detalles (READ)</h1>
		<h3>Bienvenido <?php print($_SESSION['user']);?></h3>
		<a href="logout.php">Cerrar sesion</a>

		<nav>
			<ul>
				<li><a href="../inicio.php">Inicio</a></li>
			</ul>
		</nav>
	</header>
	<section>
		<table border="1">
			<thead>
				<tr>
				<th>id</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th>Imagen</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$db = db::getDBConnection();
					$Respuesta = $db->getCard($_GET['card']);
					while ($Card = $Respuesta->fetch_assoc()) {
						print("<tr>");
							print("<td>".$Card['id']."</td>");
							print("<td>".$Card['nombre']."</td>");
							print("<td>".$Card['descripcion']."</td>");
							print("<td>".$Card['precio']."</td>");
							print("<td><img src='../".$Card['imagen']."' width=150px></td>");
						print("</tr>");
					}
				?>
			</tbody>
		</table>
	</section>


</body>
</html>