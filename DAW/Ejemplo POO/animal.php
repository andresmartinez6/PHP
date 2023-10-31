<?php  

class animal
{
	public $nombre;
	public $color;
	private $f_nac;

	public function __construct ($n='', $c='', $f='')
	{
		$this->nombre = $n;
		$this->color = $c;
		$this->f_nac = $f;
	}

	public function __set($pro, $v)
	{
		$this->$pro = $v;
	}

	public function edad ()
	{
		if($this->f_nac =='')
		{
			return "No se ha introducido edad";
		}
		else
		{
			$marca_fecha = strtotime($this->f_nac);
			$marca_hoy = time();

			$segundos = $marca_hoy - $marca_fecha;
			$dias = $segundos/60/60/24;
			$edad = round($dias/365, 0);

			return $edad;
		}
		
	}

}

?>