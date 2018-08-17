<?php

require_once "conexion.php";

class ModelsUsuarios {

	/*==================================
	MOSTRAR USUARIOS
	==================================*/
	static public function mdlMostrarUsuarios($tabla, $item, $valor) {

	    if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
		$stmt -> close();
		$stmt = null;
	}

    /*==================================
    REGISTRO DE USUARIOS
    ==================================*/
    static public function mdlIngresarUsuario($tabla, $datos){
        $estado = 1;
        $ultimo_login = "2018-08-10 07:00:00";

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto, estado, ultimo_login) 
                                              VALUES (:nombre, :usuario, :password, :perfil, :foto, :estado, :ultimo_login)");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":estado", $estado);
        $stmt -> bindParam(":ultimo_login", $ultimo_login);

        if  ($stmt->execute()){
            return "ok";
        } else {
            return "error";
        }

        $stmt -> close();
        $stmt = null;
    }

    /*==================================
	EDITAR USUARIOS
	==================================*/
    static public function mdlEditarUsuario($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt -> bindParam(":foto", $datos["ruta"], PDO::PARAM_STR);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt -> close();
        $stmt = null;
    }

    /*==================================
	ACTUALIZAR USUARIOS
	==================================*/
    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

        if ($stmt -> execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt -> close();
        $stmt = null;
    }
}