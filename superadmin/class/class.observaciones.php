<?php  
class observaciones
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
			$clase=__CLASS__;
			self::$instance=new $clase;
		}
		return self::$instance;
	}
	public function getoptionobservaciones()
	{
		try
		{
			$opciones=$this->conex->prepare("SELECT * FROM observaciones");
			$opciones->execute();
			$y="";
			while($dataopcion=$opciones->fetchObject())
			{
				$y=$y."<option value='".$dataopcion->observacion."'>".$dataopcion->observacion."</option>";
			}
			$this->conex=null;
			echo $y;
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion ...".$e->getMessage();
			die();
		}
	}
}
?>