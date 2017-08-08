<?php
session_start();
require_once (__DIR__.'/../Modelo/Persona.php');

if(!empty($_GET['action'])){
    PersonaCtlr::main($_GET['action']);
}

class PersonaCtlr{

    static function main($action){
        if ($action == "crear"){
            PersonaCtlr::crear();
        }else if ($action == "editar"){
            PersonaCtlr::editar();
        }else if ($action == "buscarID"){
            PersonaCtlr::buscarID(1);
        }else if($action == "Login"){
            PersonaCtlr::Login();
        }else if($action == "CerrarSession"){
            PersonaCtlr::CerrarSession();
        }
    }

    static public function crear (){
        try {
            $arrayUser = array();
            $arrayUser['Nombres'] = $_POST['Nombres'];
            $arrayUser['Apellidos'] = $_POST['Apellidos'];
            $arrayUser['Telefono'] = $_POST['Telefono'];
            $arrayUser['User'] = $_POST['User'];
            $arrayUser['Password'] = $_POST['Password'];
            $arrayUser['Tipo'] = $_POST['Tipo'];
            $arrayUser['Estado'] = $_POST['Estado'];
            $usuario = new usuarios ($arrayUser);
            $usuario->insertar();
            header("Location: ../insertar.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../insertar.php?respuesta=error");
        }
    }

    static public function editar (){
        try {
            $arrayUser = array();
            $arrayUser['Nombres'] = $_POST['Nombres'];
            $arrayUser['Apellidos'] = $_POST['Apellidos'];
            $arrayUser['Telefono'] = $_POST['Telefono'];
            $arrayUser['User'] = $_POST['User'];
            $arrayUser['Password'] = $_POST['Password'];
            $arrayUser['Tipo'] = $_POST['Tipo'];
            $arrayUser['Estado'] = $_POST['Estado'];
            $arrayUser['idUsuarios'] = $_POST['idUsuarios'];
            var_dump($arrayUser);
            $usuario = new usuarios ($arrayUser);
            $usuario->editar();
            header("Location: ../editar.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../editar.php?respuesta=error");
        }
    }

    static public function buscarID ($id){
        try {
            return usuarios::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error");
        }
    }

    public function buscarAll (){
        try {
            return usuarios::getAll();
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error");
        }
    }

    public function buscar ($campo, $parametro){
        try {
            return usuarios::getAll();
        } catch (Exception $e) {
            header("Location: ../buscar.php?respuesta=error");
        }
    }

    public function Login (){
        try {
            $User = $_POST['User'];
            $Password = $_POST['Password'];
            if(!empty($User) && !empty($Password)){
                $respuesta = Persona::Login($User, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['idP'] = $respuesta['idP'];
                    $_SESSION['tipo'] = $respuesta['tipo'];
                    echo TRUE;
                }else if($respuesta == "Password Incorrecto"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
                    echo "</div>";
                }else if($respuesta == "No existe el usuario"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos</p>";
                    echo "</div>";
                }
            }else{
                echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                echo "<strong>Error!</strong> Datos Vacios</p>";
                echo "</div>";
            }
        } catch (Exception $e) {
            header("Location: ../loginx.php?respuesta=error");
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../Vista/login.php");
    }

}
?>