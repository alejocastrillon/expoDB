<?php
class municipios
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
	public function getmuni($dpto)
	{
		try
		{
			$query=$this->conex->prepare("SELECT * FROM municipios WHERE Codigo_Departamento=?");
			$query->bindParam(1, $dpto);
			$query->execute();
			$y="";
			while($row=$query->fetchObject())
			{
				$y=$y."<option value='".$row->Codigo_Municipio."'>".$row->Nombre_Municipio."</option>";
			}
			$this->conex=null;
			echo $y;
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion..".$e->getMessage();
			die();
		}
	}
}
?>