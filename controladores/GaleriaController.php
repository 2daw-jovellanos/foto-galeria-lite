<?php
require_once "Controller.php";
require_once "funciones.php";

class GaleriaController extends Controller {

    function mostrarFotos($error_msg="") {
        $filenames = glob("uploads/*.{jpg,jpeg,gif,png,webp}", GLOB_BRACE);
        $fotos = [];
        foreach ($filenames as $filename) {
            array_push($fotos, [
                "src" => $filename, 
                "size" => filesize($filename),
                "name" => substr($filename, strpos($filename,"/")+1)
                ]);
        }
        require "vistas/galeria.phtml";
    }

    function recibirFichero() {
        $error_msg="";
        $name = strtolower($_FILES["foto"]["name"]);
        if (endsWith($name, "jpg") || endsWith($name, "png") || endsWith($name, "gif")
        || endsWith($name, "webp")|| endsWith($name, "jpeg")) {
            // copiar fichero
            $tmp_name = $_FILES["foto"]["tmp_name"];
            move_uploaded_file($tmp_name, "uploads/$name");
        } else {
            $error_msg="El fichero subido no tiene una extensión de imagen.";
        }
        $this->mostrarFotos($error_msg);
    }

}