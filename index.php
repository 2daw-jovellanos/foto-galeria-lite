<?php
require_once "controladores/GaleriaController.php";
// Esto es el router, porque aunque esta aplicacion es muy simple
// una vez que sabes hacerlo así ya no puedes hacerlo de otra manera

// Pongo solo dos rutas: 
//      Si entro por get al index, solo quiero ver la galería
//      Si entro por post, entonces me han enviado un archivo. -> Lo grabo y muestro la galería
switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        (new GaleriaController)->recibirFichero();
        break;
    default:
        (new GaleriaController)->mostrarFotos();
}