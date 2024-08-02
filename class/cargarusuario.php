<?php
session_start();
include("conectar_bd.php");
include("registro.php");

$user = $_POST['user_reg'];
$correo1 = $_POST['reg_email1'];
$correo2 = $_POST['reg_email2'];
$password1 = $_POST['reg_password1'];
$password2 = $_POST['reg_password2'];

$base = new BaseDatos('localhost', 'root', '', 'portfolio');
$registro = new Registro($base);
$registro->registro($user, $correo1, $correo2, $password1, $password2);
?>