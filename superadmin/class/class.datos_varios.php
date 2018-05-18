<?php 
class datos_varios
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
	public function getmun()
	{
		try
		{
			$query=$this->conex->prepare("SELECT * FROM datos_varios");
			$query->execute();
			return $query->fetchAll();
			$this->conex=null;
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
		}
	}
	public function mun($id)
	{
		try
		{
			$query=$this->conex->prepare("SELECT* FROM datos_varios WHERE CODIGO=?");
			$query->bindParam(1, $id);
			$query->execute();
			while($row=$query->fetchObject())
			{
				$ciudad=$row->Desmun;
			}
			$this->conex=null;
			return $ciudad;
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
			die();
		}
	}
}
?>