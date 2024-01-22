
<?php

function conectar(){
    $conexion= new mysqli ('localhost', 'root' , '', 'biblioteca');
    $conexion->set_charset('utf8');
    return $conexion;
}

?>