<?php

/**
 * indica si $str termina en $sub
 *
 * @param string $str Una cadena
 * @param string $sub una terminacion
 * @return boolean true si $str termina en $sub
 */

function endsWith($str, $sub) {
    return (substr($str, strlen($str) - strlen($sub)) === $sub);
}
