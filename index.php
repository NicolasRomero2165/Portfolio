<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="css/bootstrap.min.css" rel="StyleSheet">
    <link rel="stylesheet" href="css/portfolio.css">
</head>
<body>
<div>
    <header>
        <h1>Rodrigo Nicolás Romero</h1>

        <p>Bienvenidos a mi portfolio, aquí les mostraré todo lo que he aprendido hasta el momento con respecto a ser desarrollador. De momento no cuento con experiencia pero me encantaría insertarme en el mercado laboral y seguir aprendiendo.</p>
    </header>
</div>
<div>
<section>
		<h2>Registro</h2>
		<p>He creado un registro de página web donde verifica que no haya duplicados de usuarios además de solicitar un código para poder terminar de realizar el registro, verificando el correo electrónico y evitando el spam. También permite realizar comentarios más abajo.</p>
		<form action="class/cargarusuario.php" method="POST">
            <input type="text" maxlength="9" placeholder="Usuario" name="user_reg" required>
			<input type="email" maxlength="30" placeholder="Correo electrónico" name="reg_email1" required>
			<input type="email" maxlength="30" placeholder="Verifique el Correo electrónico" name="reg_email2" required>
			<input type="password" maxlength="60" placeholder="Contraseña" name="reg_password1" required>
			<input type="password" maxlength="60" placeholder="Verifique la Contraseña" name="reg_password2" required></br>
			<input type="submit" value="REGISTRARSE" class="boton">
		</form>
		<?php
	if (isset($_SESSION['conectado'])) {
		$longstr = substr(session_encode(), 12, 1);
		echo "<p>Bienvenido <b>".substr(session_encode(), 14, $longstr+2)."</b> a mi portfolio.</p>"; ?>
		<form action="class/salir.php" method="post">
			<input class="boton" type="submit" value="CERRAR SESIÓN">
		</form>
	<?php } else { ?>
		<h3>Iniciar sesión</h3>
		<form action="class/verificarusuario.php" method="POST">
			<input type="email" maxlength="30" placeholder="Correo electrónico" name="log_email" required>
			<input type="password" placeholder="Contraseña" name="log_password" required></br>
			<input type="submit" value="INICIAR SESIÓN" class="boton">
		</form>
	<?php } ?>
	</section>
	<aside>
	<?php
	if (isset($_GET['res'])) {
		switch ($_GET['res']) {
			case 'error_regu':
				$resultado = 'El <b>usuario ya se encuentra registrado</b>, intente con otro.';
			break;
			case 'error_regc':
				$resultado = 'El <b>correo ya se encuentra registrado</b>, intente con otro.';
			break;
			case 'reg_ok':
				$resultado = 'Usuario registrado exitosamente.';
			break;
			case 'error_user':
                $resultado = 'Correo electrónico no registrado.';
            break;
			case 'error_pass':
				$resultado = 'La contraseña es incorrecta.';
			break; 
			case 'error_val':
				$resultado = 'Hubo un error con la verificación de sus datos.';
			break; }
	?>
		<p><?php echo $resultado; } ?></p>
  </aside>
</div>
</body>
<footer>
</footer>
</html>