<?php
// Falta validar el ingreso de categorías repetidas

require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.model.php";

class AjaxCategorias {
    /*=============================
    EDITAR CATEGORIA
    =============================*/
	public $idCategoria;
	
	public function ajaxEditarCategoria() {
		// 2. Los valores a consultar
		$item = "id";
		$valor = $this -> idCategoria;

		// 1.Solicitar respuesta al controlador con el método mostrarCategorias
		$respuesta = ControllerCategorias::ctrMostrarCategorias($item, $valor);
		
		// Obtener respuesta en json
		echo json_encode($respuesta);
	}
}

/*=============================
EDITAR CATEGORIA
=============================*/
if (isset($_POST["idCategoria"])) {
	// Se instancia la clase
	$categoria = new AjaxCategorias();

	// A la propiedad publica agregar el valor que viene en la variabe POST
	$categoria -> idCategoria = $_POST["idCategoria"];

	// Ejecutar el metodo AjaxEditarCategoria
	$categoria -> ajaxEditarCategoria();
}