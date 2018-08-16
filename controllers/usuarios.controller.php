<?php

class ControllerUsuarios{
	/*==================================
	INGRESO DE USUARIO
	==================================*/

	static public function ctrIngresoUsuario() {

		if(isset($_POST["ingUsuario"])) {

			if( preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

                    $salt = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';
                    $encriptar = crypt($_POST["ingPassword"], $salt);

					$tabla = "usuarios";

					$item = "usuario";
					$valor = $_POST["ingUsuario"];

					$respuesta = ModelsUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                    // Validar si usuario se loguea correctamente
					if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar) {
                        //echo '<br><div class="alert alert-success">Bienvenido al sistema.</div>';
                        $_SESSION["iniciarSesion"] = "ok";
                        echo '
                                <script>
                                    window.location = "inicio";
                                </script>
                        ';
                    } else {
					    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }

				}
		}
	}

    /*==================================
    REGISTRO DE USUARIO
    ==================================*/
    static public function crtCrearUsuario() {
        if (isset($_POST["nuevoUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

                /* Validar la imagen */
                $ruta = "";

                if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /* Crear directorio para guardar foto de usuario */
                    $directorio = "views/img/users/".$_POST["nuevoUsuario"];
                    mkdir($directorio, 0755);

                    /* De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP */
                    if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
                        /* Guardar la imagen en el directorio */
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "views/img/users/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

                        $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino,$origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }
                    if ($_FILES["nuevaFoto"]["type"] == "image/png") {
                        /* Guardar la imagen en el directorio */
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "views/img/users/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

                        $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino,$origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "usuarios";

                $salt = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';
                $encriptar = crypt($_POST["nuevoPassword"], $salt);

                $datos = array( "nombre" => $_POST["nuevoNombre"],
                                "usuario" => $_POST["nuevoUsuario"],
                                "password" => $encriptar,
                                "perfil" => $_POST["nuevoPerfil"],
                                "ruta" => $ruta);

                $respuesta = ModelsUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok"){
                    echo '<script>
                        swal({
                            type: "success",
                            title: "¡El usuario ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"                        
                        }).then((resultado) => {
                            if (resultado.value){
                                window.location = "usuarios";
                            } 
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"                        
                    }).then((resultado) => {
                        if (resultado.value){
                            window.location = "usuarios";
                        } 
                    })
                </script>';
            }
        }
    }
}