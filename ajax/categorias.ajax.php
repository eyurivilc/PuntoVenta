<?php
/**
 * Created by PhpStorm.
 * User: eyurivilca
 * Date: 18/08/18
 * Time: 16:16
 */
require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.model.php";

class AjaxCategoria {
    /*=============================
    VALIDAR NO REPETIR CATEGORIA
    =============================*/
    public $validarCategoria;

    public function ajaxValidarCategoria() {
        $item = "categoria";
        $valor = $this->validarCategoria;
        $respuesta = ControllerCategorias::crtMostrarCategoria($item, $valor);
        echo json_encode($respuesta);
    }
}

/*=============================
VALIDAR NO REPETIR CATEGORIA
=============================*/
if (isset($_POST["validarCategoria"])) {
    $valCategoria = new AjaxCategoria();
    $valCategoria -> validarCategoria = $_POST["validarCategoria"];
    $valCategoria -> ajaxValidarCategoria();
}
