<?php 
class Novedad
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
			echo "Conexion Fallida....".$e->getMessage();
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
	public function getnumcarnet($muni)
	{
		try
		{
			$nov=$this->conex->prepare("SELECT MAX(Numero_Carnet) AS numeronov FROM novedades WHERE Numero_Carnet LIKE '76".$muni."%'");
			$nov->execute();
			if($nov->rowCount()>0)
			{
				while($numnov=$nov->fetchObject())
				{
					$novid=$numnov->numeronov;
				}
			}
			else
			{
				$novid="76".$muni."00000000";
			}
			$tras=$this->conex->prepare("SELECT MAX(Numero_Carnet) AS numerotras FROM traslados WHERE Numero_Carnet LIKE '76".$muni."%'");
			$tras->execute();
			if($tras->rowCount()>0)
			{
				while($numtras=$tras->fetchObject())
				{
					$trasid=$numtras->numerotras;
				}
			}
			else
			{
				$trasid="76".$muni."00000000";
			}
			$master=$this->conex->prepare("SELECT MAX(Numero_Carnet) AS numeromaster FROM maestro WHERE Numero_Carnet LIKE '76".$muni."%'");
			$master->execute();
			if($master->rowCount()>0)
			{
				while($numaster=$master->fetchObject())
				{
					$masterid=$numaster->numeromaster;
				}
			}
			else
			{
				$masterid="76".$muni."00000000";
			}
			$active=$this->conex->prepare("SELECT MAX(numero_carnet) AS numeroactive FROM activos_fosygas WHERE numero_carnet LIKE '76".$muni."%'");
			$active->execute();
			if($active->rowCount()>0)
			{
				while($numactive=$active->fetchObject())
				{
					$activeid=$numactive->numeroactive;
				}
			}
			else
			{
				$activeid="76".$muni."00000000";
			}
			$consecutivo=max($novid,$trasid,$masterid,$activeid)+1;
			return $consecutivo;
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion....".$e->getMessage();
			die();
		}
	}
	public function getnumform()
	{
		$nov=$this->conex->prepare("SELECT Formulario FROM novedades WHERE Formulario=(SELECT MAX(Formulario) FROM novedades)");
		$nov->execute();
		while($numnov=$nov->fetchObject())
		{
			$formnov=$numnov->Formulario;
		}
		$tras=$this->conex->prepare("SELECT Formulario FROM traslados WHERE Formulario=(SELECT MAX(Formulario) FROM traslados)");
		$tras->execute();
		while($numtras=$tras->fetchObject())
		{
			$formtras=$numtras->Formulario;
		}
		$master=$this->conex->prepare("SELECT Formulario FROM maestro WHERE Formulario=(SELECT MAX(Formulario) FROM maestro)");
		$master->execute();
		while($numaster=$master->fetchObject())
		{
			$formaster=$numaster->Formulario;
		}
		$consecutivo=max($formnov, $formtras, $formaster)+1;
		return $consecutivo;
	}
	public function insnov($type, $observacion, $tipodoc, $iddoc, $apellido1, $apellido2, $nombre1, $nombre2, $fechanac, $dptoafi, $ciudadafi, $valor1, $valor2, $valor3, $valor4, $direccion, $telefono, $ficha, $nivel, $tipopob, $zona, $genero)
	{
		$codent="ESS076";
		$fecha=date("d/m/Y");
		try
		{
			$query=$this->conex->prepare("INSERT INTO novedades (Observacion, Fecha_Realizacion, Codigo_Entidad, Tipo_Documento, Numero_Identificacion_Afil, Apellido_1, Apellido_2, Nombre_1, Nombre_2, Fecha_Nacimiento, Codigo_Dpto_afi, Codigo_Mpio_afi, Codigo_Novedad, Fecha_Novedad, Valor_1, Valor_2, Valor_3, Valor_4, DIRECCION, TELEFONO, FICHA, NIVEL, Formulario, Tipo_Poblacion, Numero_Carnet, zona, Genero_afiliado) VALUES (:observacion, :fecha, :codigoentidad, :tipodoc, :iddoc, :apellido1, :apellido2, :nombre1, :nombre2, :fechanac, :dptoafi, :ciudadafi, :type, :fecha, :valor1, :valor2, :valor3, :valor4, :direccion, :telefono, :ficha, :nivel, :formulario, :tipo_pob, :numcarnet, :zona, :genero)");
			$query->bindParam(':observacion',$observacion);
			$query->bindParam(':fecha',$fecha);
			$query->bindParam(':codigoentidad',$codent);
			$query->bindParam(':tipodoc',$tipodoc);
			$query->bindParam(':iddoc',$iddoc);
			$query->bindParam(':apellido1',$apellido1);
			$query->bindParam(':apellido2',$apellido2);
			$query->bindParam(':nombre1',$nombre1);
			$query->bindParam(':nombre2',$nombre2);
			$query->bindParam(':fechanac',$fechanac);
			$query->bindParam(':dptoafi',$dptoafi);
			$query->bindParam(':ciudadafi',$ciudadafi);
			$query->bindParam(':type',$type);
			$query->bindParam(':valor1',$valor1);
			$query->bindParam(':valor2',$valor2);
			$query->bindParam(':valor3',$valor3);
			$query->bindParam(':valor4',$valor4);
			$query->bindParam(':direccion',$direccion);
			$query->bindParam(':telefono',$telefono);
			$query->bindParam(':ficha',$ficha);
			$query->bindParam(':nivel',$nivel);
			$formulario=Novedad::singleton();
			$numform=$formulario->getnumform();
			$query->bindParam(':formulario',$numform);
			$query->bindParam(':tipo_pob',$tipopob);
			if($type=="N04")
			{
				$numero=Novedad::singleton();
				$numcarnet=$numero->getnumcarnet($valor2);
				$query->bindParam(':numcarnet',$numcarnet);
			}
			else
			{
				$numero=Novedad::singleton();
				$numcarnet=$numero->getnumcarnet($ciudadafi);
				$query->bindParam(':numcarnet',$numcarnet);
			}
			$query->bindParam(':zona',$zona);
			$query->bindParam(':genero',$genero);
			$query->execute();
			$this->conex=null;
			echo "Registro de novedad exitoso";
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
			die();
		}
	}	
	public function Carnetizar($id, $nov)
	{
		try
		{
			if($nov!="N01")
			{
				$carnet=$this->conex->prepare("SELECT * FROM novedades WHERE Numero_Identificacion_Afil=? ORDER BY Consecutivo DESC LIMIT 1");
				$carnet->bindParam(1, $id);
				$carnet->execute();
				$this->conex=null;
				return $carnet->fetchAll();
			}
			else
			{
				$carnet=$this->conex->prepare("SELECT * FROM novedades WHERE Valor_2=? ORDER BY Consecutivo DESC LIMIT 1");
				$carnet->bindParam(1, $id);
				$carnet->execute();
				$this->conex=null;
				return $carnet->fetchAll();
			}
		}
		catch(PDOException $e)
		{
			echo "No se pudo realizar la accion...".$e->getMessage();
			die();
		}
	}		
	public function generateexcel($datebeg, $dateend)
	{
		try
		{
			$mes=date("m");
			$mymonth="%".$mes."%";
			$newexcel=$this->conex->prepare("SELECT * FROM novedades WHERE Fecha_Realizacion BETWEEN ? AND ?");
			$newexcel->bindParam(1,$datebeg);
			$newexcel->bindParam(2,$dateend);
			$newexcel->execute();
			require_once 'Classes/PHPExcel.php';
			$excel=new PHPExcel();
			$excel->getProperties()->setCreator("appunidos.com");
			$excel->setActiveSheetIndex(0)->setCellValue("A1","Consecutivo");
			$excel->setActiveSheetIndex(0)->setCellValue("B1","Observacion");
			$excel->setActiveSheetIndex(0)->setCellValue("C1","Fecha_Realizacion");
			$excel->setActiveSheetIndex(0)->setCellValue("D1","Codigo_Entidad");
			$excel->setActiveSheetIndex(0)->setCellValue("E1","Tipo_Documento");
			$excel->setActiveSheetIndex(0)->setCellValue("F1","Numero de Identificacion");
			$excel->setActiveSheetIndex(0)->setCellValue("G1","Primer Apellido");
			$excel->setActiveSheetIndex(0)->setCellValue("H1","Segundo Apellido");
			$excel->setActiveSheetIndex(0)->setCellValue("I1","Primer Nombre");
			$excel->setActiveSheetIndex(0)->setCellValue("J1","Segundo Nombre");
			$excel->setActiveSheetIndex(0)->setCellValue("K1","Fecha_Nacimiento");
			$excel->setActiveSheetIndex(0)->setCellValue("L1","Codigo Dpto");
			$excel->setActiveSheetIndex(0)->setCellValue("M1","Codigo Mpio");
			$excel->setActiveSheetIndex(0)->setCellValue("N1","Tipo_Novedad");
			$excel->setActiveSheetIndex(0)->setCellValue("O1","Fecha de Novedad");
			$excel->setActiveSheetIndex(0)->setCellValue("P1","Valor 1");
			$excel->setActiveSheetIndex(0)->setCellValue("Q1","Valor 2");
			$excel->setActiveSheetIndex(0)->setCellValue("R1","Valor 3");
			$excel->setActiveSheetIndex(0)->setCellValue("S1","Valor 4");
			$excel->setActiveSheetIndex(0)->setCellValue("T1","Valor 5");
			$excel->setActiveSheetIndex(0)->setCellValue("U1","Valor 6");
			$excel->setActiveSheetIndex(0)->setCellValue("V1","Valor 7");
			$excel->setActiveSheetIndex(0)->setCellValue("W1","Direccion");
			$excel->setActiveSheetIndex(0)->setCellValue("X1","Telefono");
			$excel->setActiveSheetIndex(0)->setCellValue("Y1","Ficha");
			$excel->setActiveSheetIndex(0)->setCellValue("Z1","Nivel");
			$excel->setActiveSheetIndex(0)->setCellValue("AA1","Formulario");
			$excel->setActiveSheetIndex(0)->setCellValue("AB1","Tipo_Poblacion");
			$excel->setActiveSheetIndex(0)->setCellValue("AC1","Numero_Carnet");
			$excel->setActiveSheetIndex(0)->setCellValue("AD1","Zona");
			$excel->setActiveSheetIndex(0)->setCellValue("AE1","Genero");
			$i=2;
			while($data=$newexcel->fetchObject())
			{
				$excel->setActiveSheetIndex(0)->setCellValue("A".$i, $data->Consecutivo);
				$excel->setActiveSheetIndex(0)->setCellValue("B".$i, $data->Observacion);
				$excel->setActiveSheetIndex(0)->setCellValue("C".$i, $data->Fecha_Realizacion);
				$excel->setActiveSheetIndex(0)->setCellValue("D".$i, $data->Codigo_Entidad);
				$excel->setActiveSheetIndex(0)->setCellValue("E".$i, $data->Tipo_Documento);
				$excel->setActiveSheetIndex(0)->setCellValue("F".$i, $data->Numero_Identificacion_Afil);
				$excel->setActiveSheetIndex(0)->setCellValue("G".$i, $data->Apellido_1);
				$excel->setActiveSheetIndex(0)->setCellValue("H".$i, $data->Apellido_2);
				$excel->setActiveSheetIndex(0)->setCellValue("I".$i, $data->Nombre_1);
				$excel->setActiveSheetIndex(0)->setCellValue("J".$i, $data->Nombre_2);
				$excel->setActiveSheetIndex(0)->setCellValue("K".$i, $data->Fecha_Nacimiento);
				$excel->setActiveSheetIndex(0)->setCellValue("L".$i, $data->Codigo_Dpto_afi);
				$excel->setActiveSheetIndex(0)->setCellValue("M".$i, $data->Codigo_Mpio_afi);
				$excel->setActiveSheetIndex(0)->setCellValue("N".$i, $data->Codigo_Novedad);
				$excel->setActiveSheetIndex(0)->setCellValue("O".$i, $data->Fecha_Novedad);
				$excel->setActiveSheetIndex(0)->setCellValue("P".$i, $data->Valor_1);
				$excel->setActiveSheetIndex(0)->setCellValue("Q".$i, $data->Valor_2);
				$excel->setActiveSheetIndex(0)->setCellValue("R".$i, $data->Valor_3);
				$excel->setActiveSheetIndex(0)->setCellValue("S".$i, $data->Valor_4);
				$excel->setActiveSheetIndex(0)->setCellValue("T".$i, $data->Valor_5);
				$excel->setActiveSheetIndex(0)->setCellValue("U".$i, $data->Valor_6);
				$excel->setActiveSheetIndex(0)->setCellValue("V".$i, $data->Valor_7);
				$excel->setActiveSheetIndex(0)->setCellValue("W".$i, $data->DIRECCION);
				$excel->setActiveSheetIndex(0)->setCellValue("X".$i, $data->TELEFONO);
				$excel->setActiveSheetIndex(0)->setCellValue("Y".$i, $data->FICHA);
				$excel->setActiveSheetIndex(0)->setCellValue("Z".$i, $data->NIVEL);
				$excel->setActiveSheetIndex(0)->setCellValue("AA".$i, $data->Formulario);
				$excel->setActiveSheetIndex(0)->setCellValue("AB".$i, $data->Tipo_Poblacion);
				$excel->setActiveSheetIndex(0)->setCellValue("AC".$i, $data->Numero_Carnet);
				$excel->setActiveSheetIndex(0)->setCellValue("AD".$i, $data->zona);
				$excel->setActiveSheetIndex(0)->setCellValue("AE".$i, $data->Genero_afiliado);
				$i++;
			}
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="novedadesdesde'.$datebeg.'hasta'.$dateend.'.xlsx"');
			header('Cache-Control:max-age=0');
			$writer=PHPExcel_IOFactory::createWriter($excel,'Excel2007');
			$writer->save('php://output');
			exit;
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