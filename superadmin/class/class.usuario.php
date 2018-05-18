<?php 
class usuario
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
	public function insertusers($id, $nom1, $nom2, $ape1, $ape2, $fechanac, $dpto, $ciudad, $codmun, $nameuser, $pass)
	{
		try
		{
			$comp=$this->conex->prepare("SELECT * FROM usuario WHERE iduser=?");
			$comp->bindParam(1, $id);
			$comp->execute();
			if($comp->rowCount()>0)
			{
				echo "Existe un registro con este documento de identificacion";
				$this->conex=null;
			}
			else
			{
				$contra=md5($pass);
				$query=$this->conex->prepare("INSERT INTO usuario VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$query->bindParam(1, $id);
				$query->bindParam(2, $nom1);
				$query->bindParam(3, $nom2);
				$query->bindParam(4, $ape1);
				$query->bindParam(5, $ape2);
				$query->bindParam(6, $fechanac);
				$query->bindParam(7, $dpto);
				$query->bindParam(8, $ciudad);
				$query->bindParam(9, $codmun);
				$query->bindParam(10, $nameuser);
				$query->bindParam(11, $contra);
				$query->execute();
				echo "Registro exitoso";
				$this->conex=null;
			}
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion..".$e->getMessage();
			die();
		}
	}
	public function getallusers($param)
	{
		try
		{
			$pri=$param."%";
			$med="%".$param."%";
			$fin="%".$param;
			$query=$this->conex->prepare("SELECT * FROM consolidadoempleados WHERE iduser LIKE :prin OR iduser LIKE :med OR iduser LIKE :fin OR nombre1 LIKE :prin OR nombre1 LIKE :med OR nombre1 LIKE :fin OR nombre2 LIKE :prin OR nombre2 LIKE :med OR nombre2 LIKE :fin OR apellido1 LIKE :prin OR apellido1 LIKE :med OR apellido1 LIKE :fin OR apellido2 LIKE :prin OR apellido2 LIKE :med OR apellido2 LIKE :fin OR Desmun LIKE :prin OR Desmun LIKE :med OR Desmun LIKE :fin");
			$query->bindParam(":prin",$pri);
			$query->bindParam(":med",$med);
			$query->bindParam(":fin",$fin);
			$query->execute();
			return $query->fetchAll();
			$this->conex=null;
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion ....".$e->getMessage();
			die();
		}
	}
	public function getuser($id)
	{
		try
		{
			$query=$this->conex->prepare("SELECT * FROM usuario WHERE iduser=?");
			$query->bindParam(1, $id);
			$query->execute();
			while($row=$query->fetchObject())
			{
				$data=array("camponom1"=>$row->nombre1,"camponom2"=>$row->nombre2,"campoape1"=>$row->apellido1,"campoape2"=>$row->apellido2,"campofechanac"=>$row->fechanac,"campodpto"=>$row->dptonac,"campociudad"=>$row->ciudad,"campocodmun"=>$row->codmun);
			}
			$this->conex=null;
			print_r(json_encode($data));
		}
		catch(PDOException $e)
		{
			echo "No se pudo la accion...".$e->getMessage();
			die();
		}
	}
	public function moduser($nom1, $nom2, $ape1, $ape2, $fechanac, $dpto, $ciudad, $codmun, $pass, $iduser)
	{
		try
		{
			if(empty($pass))
			{
				$query=$this->conex->prepare("UPDATE usuario SET nombre1=?, nombre2=?, apellido1=?, apellido2=?, fechanac=?, dptonac=?, ciudad=?, codmun=? WHERE iduser=?");
				$query->bindParam(1, $nom1);
				$query->bindParam(2, $nom2);
				$query->bindParam(3, $ape1);
				$query->bindParam(4, $ape2);
				$query->bindParam(5, $fechanac);
				$query->bindParam(6, $dpto);
				$query->bindParam(7, $ciudad);
				$query->bindParam(8, $codmun);
				$query->bindParam(9, $iduser);
				$query->execute();
				echo "Modificacion exitosa";
				$this->conex=null;
			}
			else
			{
				$contra=md5($pass);
				$query=$this->conex->prepare("UPDATE usuario SET nombre1=?, nombre2=?, apellido1=?, apellido2=?, fechanac=?, dptonac=?, ciudad=?, codmun=?, pass=? WHERE iduser=?");
				$query->bindParam(1, $nom1);
				$query->bindParam(2, $nom2);
				$query->bindParam(3, $ape1);
				$query->bindParam(4, $ape2);
				$query->bindParam(5, $fechanac);
				$query->bindParam(6, $dpto);
				$query->bindParam(7, $ciudad);
				$query->bindParam(8, $codmun);
				$query->bindParam(9, $contra);
				$query->bindParam(10, $iduser);
				$query->execute();
				echo "Modificacion exitosa";
				$this->conex=null;
			}
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
			die();
		}
	}
	public function deleteuser($id)
	{
		try
		{
			$query=$this->conex->prepare("DELETE FROM usuario WHERE iduser=?");
			$query->bindParam(1, $id);
			$query->execute();
			echo "Registro eliminado";
			$this->conex=null;
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
			die();
		}
	}
}
?>