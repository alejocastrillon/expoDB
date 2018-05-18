<?php  
class ActivosFosyga
{
	private static $instance;
	private $conex;
	private function __construct()
	{
		try
		{
			$this->conex=new PDO("mysql:host=127.0.0.1;dbname=appunidos","root","");
			$this->conex->exec("SET CHARACTER SET utf8");
			$this->conex->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
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
			$miclass=__CLASS__;
			self::$instance=new $miclass;
		}
		return self::$instance;
	}
	public function insactive($tipodoc, $numafi, $apellido1, $apellido2, $nombre1, $nombre2, $fechanac, $municipio, $fechaafi, $ficha, $direccion, $zona, $telefono, $sexo, $nivelsisben)
	{
		try
		{
			$hoy=date("d/m/Y");
			$novedad="Activo Fosyga";
			$newactive=$this->conex->prepare("INSERT INTO activos_fosygas (Fecha_Realizacion, Tipo_Documento, Numero_Identificacion_Afil, Apellido_1, Apellido_2, Nombre_1, Nombre_2, Fecha_Nacimiento, NOVEDAD, MUNICIPIO, fecha_afiliacion, ficha, direccion, zona, telefono, sexo, nivelsisben, numero_carnet) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$newactive->bindParam(1,$hoy);
			$newactive->bindParam(2,$tipodoc);
			$newactive->bindParam(3,$numafi);
			$newactive->bindParam(4,$apellido1);
			$newactive->bindParam(5,$apellido2);
			$newactive->bindParam(6,$nombre1);
			$newactive->bindParam(7,$nombre2);
			$newactive->bindParam(8,$fechanac);
			$newactive->bindParam(9,$novedad);
			$newactive->bindParam(10,$municipio);
			$newactive->bindParam(11,$fechaafi);
			$newactive->bindParam(12,$ficha);
			$newactive->bindParam(13,$direccion);
			$newactive->bindParam(14,$zona);
			$newactive->bindParam(15,$telefono);
			$newactive->bindParam(16,$sexo);
			$newactive->bindParam(17,$nivelsisben);
			require_once 'class.novedad.php';
			$carnet=Novedad::singleton();
			$numcarnet=$carnet->getnumcarnet($municipio);
			$newactive->bindParam(18,$numcarnet);
			$newactive->execute();
			$this->conex=null;
			echo "Registro de Activo exitoso";
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
			die();
		}
	}
	public function carnetizar($id)
	{
		try
		{
			$carnet=$this->conex->prepare("SELECT * FROM activos_fosygas WHERE Numero_Identificacion_Afil=? ORDER BY Id DESC LIMIT 1");
			$carnet->bindParam(1, $id);
			$carnet->execute();
			$this->conex=null;
			return $carnet->fetchAll();
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
			die();
		}
	}
}
?>