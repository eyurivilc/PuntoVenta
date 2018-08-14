<?php

class Conexion {

    /**
     * @return null|PDO
     */
    static public function conectar() {
        $hostname = 'localhost';
        $database = 'pos';
        $username = 'root';
        $password = 'root';

        /*
		$link = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
        $link -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $link -> exec("set names utf8");
        */

        try {
            $link = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
            $link -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $link -> exec("set names utf8");
            return $link;
            //print "Conexión exitosa!";
        }
        catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."";
            die();
        }
        $link = null;
	}
}