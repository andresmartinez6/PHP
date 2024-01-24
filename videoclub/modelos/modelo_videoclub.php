<?php

class modelo_alumnos{
    private $bd;
    private $series;

    public function __construct(){
        $this->bd=conectar::conexion();
    }

    public function insertarSeries($nombre,$descripcion,$foto,$activo){
        $consulta=$this->bd->prepare("INSERT into series Values(null,?,?,?,?)");
        $consulta->bind_param("sssii",$nombre,$descripcion,$foto,$activo);
        $consulta->execute();
        $consulta->store_result();
        $consulta->close();
    }

    public function modificarSerie($nombre,$descripcion,$foto,$activo){
        $consulta=$this->bd->prepare("UPDATE series set  where id=?);
    }

}