<?php
require_once "Controller.php";
require_once "funciones.php";

class GaleriaController extends Controller {

    function mostrarFotos($error_msg="") {
        $filenames = glob("uploads/*.{jpg,gif,png, webp}", GLOB_BRACE);
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
        $name = $_FILES["foto"]["name"];
        $lowername = strtolower($name);
        if (endsWith($lowername, "jpg") || endsWith($lowername, "png") || endsWith($lowername, "gif")) {
            // copiar fichero
            $tmp_name = $_FILES["foto"]["tmp_name"];
            move_uploaded_file($tmp_name, "uploads/$name");
        } else {
            $error_msg="El fichero subido no tiene una extensión de imagen.";
        }
        $this->mostrarFotos($error_msg);
    }

}