<?php

session_start();

include 'conexion.php';

$correo=$_POST['correo'];
$contrasena=$_POST['contrasena'];

$validar_login=mysqli_query($conexion, "SELECT * FROM  cliente WHERE correo='$correo' and contrasena='$contrasena'");
$fila_op=mysqli_fetch_array($validar_login);
if (mysqli_num_rows($validar_login)>0) {
	$_SESSION['usuario']=$correo;
	header("location: ../../index.php?id_cliente=".$fila_op["id_cliente"]."");
	/*echo '<form action="../bienvenido.php" method="post"enctype="multipart/form-data">
	<input type="hidden" name="id_cliente" value="'.$fila_op["id_cliente"].'">
	</form>';*/
	exit;
}else {
	echo '
		<script>
			alert("Usuario o contraseña incorrecta, por favor verifique los datos introducidos");
			window.location="../index.php";
			</script>
		';
		exit;
}

?>