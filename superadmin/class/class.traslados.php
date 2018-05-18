<?php  
class traslados
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
	public function instraslado($tipodocfosy, $numerodocfosy, $apellido1fosy, $apellido2fosy, $nombre1fosy, $nombre2fosy, $fechanacfosy, $generoafilfosy, $tipodocced, $numeroafil, $apellido1ced, $apellido2ced, $nombre1ced, $nombre2ced, $fechanaced, $generoafilced, $codigompioafil, $zona, $tipopob, $nivel, $observacion, $estado, $epss, $municipio, $dpto, $direccion, $telefono, $ficha)
	{
		try
		{
			$hoy=date("d/m/Y");
			$departamento="76";
			$entidad="ESS076";
			$modalidad="ST";
			$newtraslado=$this->conex->prepare("INSERT INTO traslados (Fecha_Realizacion, Codigo_Entidad, Tipo_Document_fosyga, Numero_Identificacion_Afil_fosyga, Apellido_1_fosyga, Apellido_2_fosyga, Nombre_1_fosyga, Nombre_2_fosyga, Fecha_Nacimiento_fosyga, Genero_afil_fosyga, TipoDocumento, Numero_IdentificacionAfil, Apellido1, Apellido2, Nombre1, Nombre2, FechaNacimiento, Genero_afiliado, Codigo_Dpto_afi, Codigo_Mpio_afi, zona, Fecha_Afiliacion_entidad, Tipo_Poblacion_Beneficiarios_subsidio, Nivel_Sisben, Modalidad, OBSERVACION, ESTADO, EPSS, MUNICIPIO, DPTO, Formulario, Direccion, Telefono, Ficha, Numero_Carnet) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$newtraslado->bindParam(1, $hoy);
			$newtraslado->bindParam(2, $entidad);
			$newtraslado->bindParam(3, $tipodocfosy);
			$newtraslado->bindParam(4, $numerodocfosy);
			$newtraslado->bindParam(5, $apellido1fosy);
			$newtraslado->bindParam(6, $apellido2fosy);
			$newtraslado->bindParam(7, $nombre1fosy);
			$newtraslado->bindParam(8, $nombre2fosy);
			$newtraslado->bindParam(9, $fechanacfosy);
			$newtraslado->bindParam(10, $generoafilfosy);
			$newtraslado->bindParam(11, $tipodocced);
			$newtraslado->bindParam(12, $numeroafil);
			$newtraslado->bindParam(13, $apellido1ced);
			$newtraslado->bindParam(14, $apellido2ced);
			$newtraslado->bindParam(15, $nombre1ced);
			$newtraslado->bindParam(16, $nombre2ced);
			$newtraslado->bindParam(17, $fechanaced);
			$newtraslado->bindParam(18, $generoafilced);
			$newtraslado->bindParam(19, $departamento);
			$newtraslado->bindParam(20, $codigompioafil);
			$newtraslado->bindParam(21, $zona);
			$newtraslado->bindParam(22, $hoy);
			$newtraslado->bindParam(23, $tipopob);
			$newtraslado->bindParam(24, $nivel);
			$newtraslado->bindParam(25, $modalidad);
			$newtraslado->bindParam(26, $observacion);
			$newtraslado->bindParam(27, $estado);
			$newtraslado->bindParam(28, $epss);
			$newtraslado->bindParam(29, $municipio);
			$newtraslado->bindParam(30, $dpto);
			require_once 'class.novedad.php';
			$numform=Novedad::singleton();
			$formulario=$numform->getnumform();
			$newtraslado->bindParam(31, $formulario);
			$newtraslado->bindParam(32, $direccion);
			$newtraslado->bindParam(33, $telefono);
			$newtraslado->bindParam(34, $ficha);
			require_once 'class.novedad.php';
			$carnet=Novedad::singleton();
			$numcarnet=$carnet->getnumcarnet($codigompioafil);
			$newtraslado->bindParam(35, $numcarnet);
			$newtraslado->execute();
			$this->conex=null;
			echo "Registro de Traslado exitoso";
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
			$carnet=$this->conex->prepare("SELECT * FROM traslados WHERE Numero_IdentificacionAfil=? ORDER BY Id DESC LIMIT 1");
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
			$newexcel=$this->conex->prepare("SELECT * FROM traslados WHERE Fecha_Realizacion BETWEEN ? AND ?");
			$newexcel->bindParam(1,$datebeg);
			$newexcel->bindParam(2,$dateend);
			$newexcel->execute();
			require_once 'Classes/PHPExcel.php';
			$excel=new PHPExcel();
			$excel->getProperties()->setCreator("appunidos.com");
			$excel->setActiveSheetIndex(0)->setCellValue("A1","Id")	;
			$excel->setActiveSheetIndex(0)->setCellValue("B1","Fecha de Realizacion");
			$excel->setActiveSheetIndex(0)->setCellValue("C1","Codigo_Entidad");
			$excel->setActiveSheetIndex(0)->setCellValue("D1","Tipo Documento Fosyga");
			$excel->setActiveSheetIndex(0)->setCellValue("E1","Numero de Identificacion fosyga");
			$excel->setActiveSheetIndex(0)->setCellValue("F1","Primer Apellido Fosyga");
			$excel->setActiveSheetIndex(0)->setCellValue("G1","Segundo Apellido Fosyga");
			$excel->setActiveSheetIndex(0)->setCellValue("H1","Primer Nombre Fosyga");
			$excel->setActiveSheetIndex(0)->setCellValue("I1","Segundo Nombre Fosyga");
			$excel->setActiveSheetIndex(0)->setCellValue("J1","Fecha Nacimiento Fosyga");
			$excel->setActiveSheetIndex(0)->setCellValue("K1","Genero Afiliado Fosyga");
			$excel->setActiveSheetIndex(0)->setCellValue("L1","Tipo de Documento");
			$excel->setActiveSheetIndex(0)->setCellValue("M1","Numero de Identificacion");
			$excel->setActiveSheetIndex(0)->setCellValue("N1","Primer Apellido");
			$excel->setActiveSheetIndex(0)->setCellValue("O1","Segundo Apellido");
			$excel->setActiveSheetIndex(0)->setCellValue("P1","Primer Nombre");
			$excel->setActiveSheetIndex(0)->setCellValue("Q1","Segundo Nombre");
			$excel->setActiveSheetIndex(0)->setCellValue("R1","Fecha de Nacimiento");
			$excel->setActiveSheetIndex(0)->setCellValue("S1","Genero Afiliado");
			$excel->setActiveSheetIndex(0)->setCellValue("T1","Codigo departamento");
			$excel->setActiveSheetIndex(0)->setCellValue("U1","Codigo municipio");
			$excel->setActiveSheetIndex(0)->setCellValue("V1","Zona");
			$excel->setActiveSheetIndex(0)->setCellValue("W1","Fecha Afiliacion");
			$excel->setActiveSheetIndex(0)->setCellValue("X1","Tipo de Poblacion");
			$excel->setActiveSheetIndex(0)->setCellValue("Y1","Nivel de Sisben");
			$excel->setActiveSheetIndex(0)->setCellValue("Z1","Modalidad");
			$excel->setActiveSheetIndex(0)->setCellValue("AA1","observacion");
			$excel->setActiveSheetIndex(0)->setCellValue("AB1","Estado");
			$excel->setActiveSheetIndex(0)->setCellValue("AC1","EPS");
			$excel->setActiveSheetIndex(0)->setCellValue("AD1","Municipio");
			$excel->setActiveSheetIndex(0)->setCellValue("AE1","Departamento");
			$excel->setActiveSheetIndex(0)->setCellValue("AF1","Numero de Formulario");
			$excel->setActiveSheetIndex(0)->setCellValue("AG1","Direccion");
			$excel->setActiveSheetIndex(0)->setCellValue("AH1","Telefono");
			$excel->setActiveSheetIndex(0)->setCellValue("AI1","Ficha");
			$excel->setActiveSheetIndex(0)->setCellValue("AJ1","Numero de Carnet");
			$i=2;
			while($data=$newexcel->fetchObject())
			{
				$excel->setActiveSheetIndex(0)->setCellValue("A".$i, $data->Id);
				$excel->setActiveSheetIndex(0)->setCellValue("B".$i, $data->Fecha_Realizacion);
				$excel->setActiveSheetIndex(0)->setCellValue("C".$i, $data->Codigo_Entidad);
				$excel->setActiveSheetIndex(0)->setCellValue("D".$i, $data->Tipo_Document_fosyga);
				$excel->setActiveSheetIndex(0)->setCellValue("E".$i, $data->Numero_Identificacion_Afil_fosyga);
				$excel->setActiveSheetIndex(0)->setCellValue("F".$i, $data->Apellido_1_fosyga);
				$excel->setActiveSheetIndex(0)->setCellValue("G".$i, $data->Apellido_2_fosyga);
				$excel->setActiveSheetIndex(0)->setCellValue("H".$i, $data->Nombre_1_fosyga);
				$excel->setActiveSheetIndex(0)->setCellValue("I".$i, $data->Nombre_2_fosyga);
				$excel->setActiveSheetIndex(0)->setCellValue("J".$i, $data->Fecha_Nacimiento_fosyga);
				$excel->setActiveSheetIndex(0)->setCellValue("K".$i, $data->Genero_afil_fosyga);
				$excel->setActiveSheetIndex(0)->setCellValue("L".$i, $data->TipoDocumento);
				$excel->setActiveSheetIndex(0)->setCellValue("M".$i, $data->Numero_IdentificacionAfil);
				$excel->setActiveSheetIndex(0)->setCellValue("N".$i, $data->Apellido1);
				$excel->setActiveSheetIndex(0)->setCellValue("O".$i, $data->Apellido2);
				$excel->setActiveSheetIndex(0)->setCellValue("P".$i, $data->Nombre1);
				$excel->setActiveSheetIndex(0)->setCellValue("Q".$i, $data->Nombre2);
				$excel->setActiveSheetIndex(0)->setCellValue("R".$i, $data->FechaNacimiento);
				$excel->setActiveSheetIndex(0)->setCellValue("S".$i, $data->Genero_afiliado);
				$excel->setActiveSheetIndex(0)->setCellValue("T".$i, $data->Codigo_Dpto_afi);
				$excel->setActiveSheetIndex(0)->setCellValue("U".$i, $data->Codigo_Mpio_afi);
				$excel->setActiveSheetIndex(0)->setCellValue("V".$i, $data->zona);
				$excel->setActiveSheetIndex(0)->setCellValue("W".$i, $data->Fecha_Afiliacion_entidad);
				$excel->setActiveSheetIndex(0)->setCellValue("X".$i, $data->Tipo_Poblacion_Beneficiarios_subsidio);
				$excel->setActiveSheetIndex(0)->setCellValue("Y".$i, $data->Nivel_Sisben);
				$excel->setActiveSheetIndex(0)->setCellValue("Z".$i, $data->Modalidad);
				$excel->setActiveSheetIndex(0)->setCellValue("AA".$i, $data->OBSERVACION);
				$excel->setActiveSheetIndex(0)->setCellValue("AB".$i, $data->ESTADO);
				$excel->setActiveSheetIndex(0)->setCellValue("AC".$i, $data->EPSS);
				$excel->setActiveSheetIndex(0)->setCellValue("AD".$i, $data->MUNICIPIO);
				$excel->setActiveSheetIndex(0)->setCellValue("AE".$i, $data->DPTO);
				$excel->setActiveSheetIndex(0)->setCellValue("AF".$i, $data->Formulario);
				$excel->setActiveSheetIndex(0)->setCellValue("AG".$i, $data->Direccion);
				$excel->setActiveSheetIndex(0)->setCellValue("AH".$i, $data->Telefono);
				$excel->setActiveSheetIndex(0)->setCellValue("AI".$i, $data->Ficha);
				$excel->setActiveSheetIndex(0)->setCellValue("AJ".$i, $data->Numero_Carnet);
				$i++;
			}
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="trasladosdesde'.$datebeg.'hasta'.$dateend.'.xlsx"');
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