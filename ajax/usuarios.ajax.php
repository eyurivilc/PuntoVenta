<?php

require_once "../controllers/usuarios.controller.php";
require_once "../models/usuarios.model.php";

class AjaxUsuarios {
    /*=============================
    EDITAR USUSARIO
    =============================*/
    public $idUsuario;

    public function ajaxEditarUsuario(){
        $item = "id";
        $valor = $this->idUsuario;
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
