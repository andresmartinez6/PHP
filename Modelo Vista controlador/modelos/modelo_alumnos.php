<?php

class modelo_alumnos{
    private $bd;
    private $alumnos;

    public function __construct(){
        $this->bd=conectar::conexion();
    }

    public function get_alumnos(){
        $consulta=$this->bd->query("select * from alumnos");
        while ($filas= $consulta->fetch_assoc()){
            $this->alumnos[] = $filas;
        }
        return $this->alumnos;
    }
    
    public function get_alumnos_nombre($nom){
        $consulta=$this->bd->prepare("select * from alumnos where nombre=?");
        $consulta->bind_param("s",$nom);
        $consulta->bind_result($dni,$nombre,$edad);
        $consulta->execute();
        $consulta->store_result();
        $i=0;

        while ($fila=$consulta->fetch()){
            $this->alumnos[$i]["dni"]=$dni;
            $this->alumnos[$i]["nombre"]=$nombre;
            $this->alumnos[$i]["edad"]=$edad;
        }
        return $this->alumnos;
        
    }

}
























?>