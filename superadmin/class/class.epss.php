<?php  
class epss
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
	public function geteps()
	{
		try
		{
			$eps=$this->conex->prepare("SELECT NOMBRE_EPS FROM epss");
			$eps->execute();
			$this->conex=null;
			return $eps->fetchAll();
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
			die();
		}
	}
}
?>