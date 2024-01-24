<?php

class conectar{
    public static function conexion()
    {
        $conexion = new mysqli("localhost", "root", "", "series");
        $conexion->set_charset("utf8");
        return $conexion;
    }
}

?>