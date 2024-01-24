<?php
	
	require_once "animal.php";
	class perro extends animal 
	{
		private $raza;
		private $sexo;

		public function __construct ($n='', $c='', $f='', $r='', $s='')
		{
			$this->nombre=$n;
			$this->color=$c;
			$this->f_nac=$f;
			$this->raza=$r;
			$this->sexo=$s;
		}

		public function __set ($pro, $va)
		{
			$this->$pro = $va;
		}

		public function __get ($pro)
		{
			return $this->$pro;
		}

		public function __toString()
		{
			$cadena = "El animal se llama $this->nombre, 
			es de color $this->color y es de raza $this->raza";
			return $cadena;
		}

		public function ladrar()
		{
			return "$this->nombre dice GUAU";
		}

		public function dormir ()
		{
			return "$this->nombre se ha dormido";
		}
	}


?>