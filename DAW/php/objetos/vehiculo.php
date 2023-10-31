<?php
    class Vehiculo{
        private $nombre;
        private $tipo;
        private $peso;

        public function __construct($n,$t,$p){
            $this->nombre=$n;
            if ($t=='C'||$t=='M'||$t=='T') {
                $this->tipo=$t;
            }
            $this->peso=$p;
        }

        public function __set($prop,$value){
            $this->$prop=$value;
        }
        public function __get($prop){
            return $this->$prop;
        }
        public function __toString(){
            $tipito='';
            if ($this->tipo=='C') {
                $tipito='Camion';
            }elseif($this->tipo=='M'){
                $tipito='Moto';
            }else{
                $tipito='Turismo';
            }
            $res="Nombre: $this->nombre <br> Tipo: $tipito <br> Peso: $this->peso"; 
            return $res;
        }




    }
?>