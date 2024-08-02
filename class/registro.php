<?php
class Registro {
    private $bd;
    function __construct($base) {
        $this->bd = $base;
    }
    public function registro($user, $correo1, $correo2, $password1, $password2){
        if($correo1 == $correo2 && $password1 == $password2) {
            $password_encriptada = password_hash($password1, PASSWORD_DEFAULT, array('cost'=>4));
            $listado1 = $this->bd->ejecutarSQL("SELECT correo FROM registro WHERE correo = '$correo1'");
            $listado2 = $this->bd->ejecutarSQL("SELECT usuario FROM registro WHERE usuario = '$user'");
            if($listado1 == NULL) {
                if($listado2 == NULL) {
                $this->bd->ejecutarSQL("INSERT INTO registro VALUES ('$user', '$correo1', '$password_encriptada')");
                header("Location: ../index.php?res=reg_ok");
                } else {
                header("Location: ../index.php?res=error_regu");
            }} else {
            header("Location: ../index.php?res=error_regc");
        }} else {
        header("Location: ../index.php?res=error_val");
    }}
            
    public function validar_registro($correo, $password){
        $usuario = $this->bd->ejecutarSQL("SELECT * FROM registro WHERE correo = '$correo'");
        $password_desencriptada = password_verify($password, $usuario[0]['clave']);
        if($usuario == NULL) {
            header("Location: ../index.php?res=error_user");
            } elseif ($password == $password_desencriptada) {
                $_SESSION['conectado'] = $usuario[0]['usuario'];
                header("Location: ../index.php");
            } else {
                header("Location: ../index.php?res=error_pass");
            }
        }
    }
?>