<?php

include('./config.php');

function conectaBD() {
    $link = mysql_connect($GLOBALS['conf']['server'], $GLOBALS['conf']['user'], $GLOBALS['conf']['password']);

    if(!$link) {
        die('Error en la conexión a la base de datos');
    }

    $dbselected = mysql_select_db($GLOBALS['conf']['db']);

    if(!$dbselected) {
        die('Error al seleccionar la base de datos');
    }
}

?>