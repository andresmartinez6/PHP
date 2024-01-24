<?php class Animal{
    public $nombre;
    public $color;
    public $f_nac;


    public function __construct($n, $c, $f){
        $this->nombre = $n;
        $this->color = $c;
        $this->f_nac = $f;
    }
    public function __set($propiedad,$valor){
        $this->$propiedad = $valor;
    }
    public function obtenerEdad(){
        $marca_f=strtotime($this->f_nac);
        $marca_hoy=time();
        $edad=($marca_hoy-$marca_f)/3600/24/365;
        return round($edad);
    }
    public function __toString(){
        $res="<b>Nombre:</b> $this->nombre <br> <b>Color:</b> $this->color<br> <b>Fecha Nacimiento:</b> $this->f_nac";
        return $res;
    }





}

?>