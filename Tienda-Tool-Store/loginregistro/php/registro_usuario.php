<?php

	include 'conexion.php';

	$id_cliente=$_POST['id_cliente'];
	$nombre_cliente=$_POST['nombre_cliente'];
	$apellido_cliente=$_POST['apellido_cliente'];
	$correo=$_POST['correo'];
	$contrasena=$_POST['contrasena'];

	$query = "INSERT INTO cliente (id_cliente, nombre_cliente, apellido_cliente, correo, contrasena) VALUES ('$id_cliente','$nombre_cliente', '$apellido_cliente', '$correo', '$contrasena')";

	$verificar_correo=mysqli_query($conexion, "SELECT *FROM cliente WHERE correo='$correo'");
	if (mysqli_num_rows($verificar_correo)>0) {
		echo '
		<script>
			alert("Este correo ya esta siendo usado, intentalo con otro correo");
			window.location="../index.php";
			</script>
		';
		exit();
	}

	$verificar_usuario=mysqli_query($conexion, "SELECT *FROM cliente WHERE id_cliente='$id_cliente'");
	if (mysqli_num_rows($verificar_usuario)>0) {
		echo '
		<script>
			alert("Este usuario ya esta siendo usado, ingrese otro nombre de usuario");
			window.location="../index.php";
			</script>
		';
		exit();
	}

	$ejecutar = mysqli_query($conexion, $query);

	if ($ejecutar) {
		echo '
		<script>
			alert("Usuario registrado correctamente");
			window.location= "../index.php";
			</script>
		';
	}else{
		echo '
		<script>
			alert("Intentalo de nuevo, el nombre de usuario o correo ya existe");
			window.location="../index.php";
			</script>
		';
	}
		mysqli_close($conexion);
?>