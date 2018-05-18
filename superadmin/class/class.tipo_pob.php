<?php
class tipo_pob
{
	private static $instance;
	private $conex;
	private function __construct()
	{
		try
		{
			$this->conex=new PDO("mysql:host=127.0.0.1;dbname=appunidos","root","");
			$this->conex->exec("SET CHARACTER SET utf8");
			$this->conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "Conexion Fallida...".$e->getMessage();
			die();
		}
	}
	public static function singleton()
	{
		if(!isset(self::$instance))
		{
			$miclase=__CLASS__;
			self::$instance=new $miclase;
		}
		return self::$instance;
	}
	public function getpob()
	{
		try
		{
			$query=$this->conex->prepare("SELECT * FROM tipo_pob");
			$query->execute();
			$y="<option value=''>Seleccione....</option>";
			while($row=$query->fetchObject())
			{
				$y=$y."<option value='".$row->Codigo."'>".$row->Codigo." | ".$row->Descripcion."</option>";
			}
			$this->conex=null;
			return $y;
		}
		catch(PDOException $e)
		{
			return "No se pudo realizar la accion...".$e->getMessage();
			die();
		}
	}
}
?>