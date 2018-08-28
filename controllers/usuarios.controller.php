<?php

class ControllerUsuarios{
	/*==================================
	INGRESO DE USUARIO
	==================================*/

	static public function ctrIngresoUsuario() {

		if(isset($_POST["ingUsuario"])) {

			if( preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

					$tabla = "usuarios";

					$item = "usuario";
					$valor = $_POST["ingUsuario"];

					$respuesta = ModelsUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

					// Trae el array de la DB
					//var_dump($respuesta["usuario"]);

                    // Validar si usuario se loguea correctamente
					if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {
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
}