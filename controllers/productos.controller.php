<?php

class ControllerProductos
{
    /*====================================
    MOSTRAR PRODUCTOS
    ====================================*/
    public static function crtMostrarProductos($item, $valor)
    {
        $tabla = "productos";
        $respuesta = ModelsProductos::mdlMostrarProductos($tabla, $item, $valor);
        return $respuesta;
    }
}
