<?php

session_start();

if (!isset($_SESSION['usuario'])) {
	echo '
	<script>
	alert("Debes iniciar sesion");
	window.location="index.php";
	</script>
	';
	session_destroy();
	die();
}
//session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bienvenido </title>
</head>

<body>
	<h1>Bienvenido a esta pagina</h1>
</body>
</html>