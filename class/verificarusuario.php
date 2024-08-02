<?php
session_start();
include("conectar_bd.php");
include("registro.php");

$correo = $_POST['log_email'];
$password = $_POST['log_password'];

$base = new BaseDatos('localhost', 'root', '', 'portfolio');
$log = new Registro($base);
$log->validar_registro($correo, $password);
?>