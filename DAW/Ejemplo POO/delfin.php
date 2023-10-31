<?php 
	
	require_once "animal.php";
	class delfin extends animal 
	{
		private $longitud;

		public function __construct ($n, $c, $f, $l)
		{
			$this->nombre=$n;
			$this->color=$c;
			$this->f_nac=$f;
			$this->longitud=$l;
		}

		public function __get ($pro)
		{
			return $this->$pro;
		}

		public function __set ($pro, $valor)
		{
			$this->$pro = $valor;
		}

		public function __toString()
		{
			$cad = "El delfín que se llama $this->nombre mide $this->longitud metros";
			return $cad;
		}

		public function saltar()
		{
			echo "$this->nombre está saltando por los aires";
		}

		public function comer()
		{
			echo "$this->nombre tiene hambre";
		}
	}


?>