<?php

require_once "../controllers/usuarios.controller.php";
require_once "../models/usuarios.model.php";

class AjaxUsuarios {
    /*=============================
    EDITAR USUSARIO
    =============================*/
    public $idUsuario;

    static public function ajaxEditarUsuario(){
        $item = "id";
        $valor = $this->idUsuario;
        $respuesta = ControllerUsuarios::ctrMostrarUsuarios($item, $valor);
        echo json_encode($respuesta);
    }
    /*=============================
    ACTIVAR USUSARIO
    =============================*/
    public $activarUsuario;
    public $activarId;

    static public function ajaxActivarUsuario() {
        $tabla = "usuarios";

        $item1 = "estado";
        $valor1 = $this->activarUsuario;

        $item2 = "id";
        $valor2 = $this->activarId;

        $respuesta = ModelsUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
    }
    /*=============================
    VALIDAR NO REPETIR USUSARIO
    =============================*/
    public $validarUsuario;

    static public function ajaxValidarUsuario() {
        $item = "usuario";
        $valor = $this->validarUsuario;
        $respuesta = ControllerUsuarios::ctrMostrarUsuarios($item, $valor);
        echo json_encode($respuesta);
    }
}

/*=============================
EDITAR USUSARIO
=============================*/
if (isset($_POST["idUsuario"])) {
    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> ajaxEditarUsuario();
}

/*=============================
ACTIVAR USUSARIO
=============================*/
if (isset($_POST["activarUsuario"])) {
    $activarUsuario = new AjaxUsuarios();
    $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
    $activarUsuario -> activarId = $_POST["activarId"];
    $activarUsuario -> ajaxActivarUsuario();
}

/*=============================
VALIDAR NO REPETIR USUSARIO
=============================*/
if (isset($_POST["validarUsuario"])) {
    $valUsuario = new AjaxUsuarios();
    $valUsuario -> validarUsuario = $_POST["validarUsuario"];
    $valUsuario -> ajaxValidarUsuario();
}
