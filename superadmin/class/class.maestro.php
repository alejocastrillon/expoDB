<?php 
class Maestro
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
			$newclass=__CLASS__;
			self::$instance=new $newclass;
		}
		return self::$instance;
	}
	public function insmaestro($ccmadre,$tipodoc,$numafi,$ape1,$ape2,$nom1,$nom2,$fechanac,$genero,$muniafi,$zona,$tipopob,$nivel,$observacion,$direccion,$telefono,$ficha)
	{
		$fecha=date("d/m/Y");
		$dpto="76";
		$codent="ESS076";
		$mod="ST";
		try
		{
			$newmaestro=$this->conex->prepare("INSERT INTO maestro (Fecha_Realizacion,CC_MADRE,Codigo_Entidad,Tipo_Documento,Numero_Identificacion_Afil,Apellido_1,Apellido_2,Nombre_1,Nombre_2,Fecha_Nacimiento,Genero_afiliado,Codigo_Dpto_af,Codigo_Mpio_af,Zona,Fecha_Afiliacion_entidad,Tipo_Poblacion_Beneficiarios_Subsidio,Nivel_Sisben,Modalida,Formulario,Observacion,Direccion,Telefono,Ficha,Numero_Carnet) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$newmaestro->bindParam(1,$fecha);
			$newmaestro->bindParam(2,$ccmadre);
			$newmaestro->bindParam(3,$codent);
			$newmaestro->bindParam(4,$tipodoc);
			$newmaestro->bindParam(5,$numafi);
			$newmaestro->bindParam(6,$ape1);
			$newmaestro->bindParam(7,$ape2);
			$newmaestro->bindParam(8,$nom1);
			$newmaestro->bindParam(9,$nom2);
			$newmaestro->bindParam(10,$fechanac);
			$newmaestro->bindParam(11,$genero);
			$newmaestro->bindParam(12,$dpto);
			$newmaestro->bindParam(13,$muniafi);
			$newmaestro->bindParam(14,$zona);
			$newmaestro->bindParam(15,$fecha);
			$newmaestro->bindParam(16,$tipopob);
			$newmaestro->bindParam(17,$nivel);
			$newmaestro->bindParam(18,$mod);
			require 'class.novedad.php';
			$formulario=Novedad::singleton();
			$numform=$formulario->getnumform();
			$newmaestro->bindParam(19,$numform);
			$newmaestro->bindParam(20,$observacion);
			$newmaestro->bindParam(21,$direccion);
			$newmaestro->bindParam(22,$telefono);
			$newmaestro->bindParam(23,$ficha);
			$carnet=Novedad::singleton();
			$numcarnet=$carnet->getnumcarnet($muniafi);
			$newmaestro->bindParam(24,$numcarnet);
			$newmaestro->execute();
			$this->conex=null;
			echo "Registro exitoso";
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
			$carnet=$this->conex->prepare("SELECT * FROM maestro WHERE Numero_Identificacion_Afil=? ORDER BY Id DESC LIMIT 1");
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
	public function generateexcel($datebeg, $dateend)
	{
		try
		{
			$newexcel=$this->conex->prepare("SELECT * FROM maestro WHERE Fecha_Realizacion BETWEEN ? AND ?");
			$newexcel->bindParam(1,$datebeg);
			$newexcel->bindParam(2,$dateend);
			$newexcel->execute();
			require_once 'Classes/PHPExcel.php';
			$excel=new PHPExcel();
			$excel->getProperties()->setCreator("appunidos.com");
			$excel->setActiveSheetIndex(0)->setCellValue("A1","Id");
			$excel->setActiveSheetIndex(0)->setCellValue("B1","Fecha de Realizacion");
			$excel->setActiveSheetIndex(0)->setCellValue("C1","CC MADRE");
			$excel->setActiveSheetIndex(0)->setCellValue("D1","Codigo Entidad");
			$excel->setActiveSheetIndex(0)->setCellValue("E1","Tipo de Documento");
			$excel->setActiveSheetIndex(0)->setCellValue("F1","Numero de Identificacion");
			$excel->setActiveSheetIndex(0)->setCellValue("G1","Primer Apellido");
			$excel->setActiveSheetIndex(0)->setCellValue("H1","Segundo Apellido");
			$excel->setActiveSheetIndex(0)->setCellValue("I1","Primer Nombre");
			$excel->setActiveSheetIndex(0)->setCellValue("J1","Segundo Nombre");
			$excel->setActiveSheetIndex(0)->setCellValue("K1","Fecha de Nacimiento");
			$excel->setActiveSheetIndex(0)->setCellValue("L1","Sexo");
			$excel->setActiveSheetIndex(0)->setCellValue("M1","Codigo Departamento");
			$excel->setActiveSheetIndex(0)->setCellValue("N1","Codigo Municipio");
			$excel->setActiveSheetIndex(0)->setCellValue("O1","Zona");
			$excel->setActiveSheetIndex(0)->setCellValue("P1","Fecha Afiliacion");
			$excel->setActiveSheetIndex(0)->setCellValue("Q1","Tipo de Poblacion");
			$excel->setActiveSheetIndex(0)->setCellValue("R1","Nivel");
			$excel->setActiveSheetIndex(0)->setCellValue("S1","Modalidad");
			$excel->setActiveSheetIndex(0)->setCellValue("T1","Formulario");
			$excel->setActiveSheetIndex(0)->setCellValue("U1","Observacion");
			$excel->setActiveSheetIndex(0)->setCellValue("V1","Direccion");
			$excel->setActiveSheetIndex(0)->setCellValue("W1","Telefono");
			$excel->setActiveSheetIndex(0)->setCellValue("X1","Ficha");
			$excel->setActiveSheetIndex(0)->setCellValue("Y1","Numero Carnet");
			$i=2;
			while($data=$newexcel->fetchObject())
			{
				$excel->setActiveSheetIndex(0)->setCellValue("A".$i, $data->Id);
				$excel->setActiveSheetIndex(0)->setCellValue("B".$i, $data->Fecha_Realizacion);
				$excel->setActiveSheetIndex(0)->setCellValue("C".$i, $data->CC_MADRE);
				$excel->setActiveSheetIndex(0)->setCellValue("D".$i, $data->Codigo_Entidad);
				$excel->setActiveSheetIndex(0)->setCellValue("E".$i, $data->Tipo_Documento);
				$excel->setActiveSheetIndex(0)->setCellValue("F".$i, $data->Numero_Identificacion_Afil);
				$excel->setActiveSheetIndex(0)->setCellValue("G".$i, $data->Apellido_1);
				$excel->setActiveSheetIndex(0)->setCellValue("H".$i, $data->Apellido_2);
				$excel->setActiveSheetIndex(0)->setCellValue("I".$i, $data->Nombre_1);
				$excel->setActiveSheetIndex(0)->setCellValue("J".$i, $data->Nombre_2);
				$excel->setActiveSheetIndex(0)->setCellValue("K".$i, $data->Fecha_Nacimiento);
				$excel->setActiveSheetIndex(0)->setCellValue("L".$i, $data->Genero_afiliado);
				$excel->setActiveSheetIndex(0)->setCellValue("M".$i, $data->Codigo_Dpto_af);
				$excel->setActiveSheetIndex(0)->setCellValue("N".$i, $data->Codigo_Mpio_af);
				$excel->setActiveSheetIndex(0)->setCellValue("O".$i, $data->Zona);
				$excel->setActiveSheetIndex(0)->setCellValue("P".$i, $data->Fecha_Afiliacion_entidad);
				$excel->setActiveSheetIndex(0)->setCellValue("Q".$i, $data->Tipo_Poblacion_Beneficiarios_Subsidio);
				$excel->setActiveSheetIndex(0)->setCellValue("R".$i, $data->Nivel_Sisben);
				$excel->setActiveSheetIndex(0)->setCellValue("S".$i, $data->Modalida);
				$excel->setActiveSheetIndex(0)->setCellValue("T".$i, $data->Formulario);
				$excel->setActiveSheetIndex(0)->setCellValue("U".$i, $data->Observacion);
				$excel->setActiveSheetIndex(0)->setCellValue("V".$i, $data->Direccion);
				$excel->setActiveSheetIndex(0)->setCellValue("W".$i, $data->Telefono);
				$excel->setActiveSheetIndex(0)->setCellValue("X".$i, $data->Ficha);
				$excel->setActiveSheetIndex(0)->setCellValue("Y".$i, $data->Numero_Carnet);
				$i++;
			}
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="maestrodesde'.$datebeg.'hasta'.$dateend.'.xlsx"');
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