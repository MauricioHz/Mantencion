<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."/third_party/fpdf/fpdf.php";

class Pdf extends FPDF {

	public function __construct() {
		parent::__construct();
	}

	public function reporte1($entidad, $repuestos){
		$this->Image('assets/image/logo1.png',15,8,40,25);
		$this->SetFont('Helvetica', '', 12);
		$this->Cell(40, 5, '', '', '', 'C');
		$this->Cell(120, 5, 'AGRICOLA SANTA MARTA DE LIRAY S.A.', '', '', 'C');
		$this->Cell(30, 5, "", 'RTL', '', 'C');
		$this->Ln();
		$this->Cell(40, 5, '', 0, '', 'C');
		$this->Cell(120, 5, utf8_decode('AVÍCOLA'), 0, '', 'C');
		$this->Cell(30, 5, "RA-G-2.7", 'LR', '', 'C');
		$this->Ln();
		$this->SetFont('Helvetica', '', 12);
		$this->Cell(40, 5, '', 0, '', 'C');
		$this->Cell(120, 5, utf8_decode('UNIDAD DE MANTENCIÓN'), 0, '', 'C');
		$this->Cell(30, 5, utf8_decode("N°".$entidad->id_orden), 'LR', '', 'C');
		$this->Ln();
		$this->Cell(40, 5, '', 0, '', 'C');
		$this->Cell(120, 5, '', 0, '', 'C');
		$this->Cell(30, 5, "", 'RLB', '', 'C');
		$this->Ln();
		$this->Cell(190, 3, '', '', '', '');
		$this->Ln();

		$this->Cell(190, 5, "", 'TRL', '', 'C');
		$this->Ln();
		$this->Cell(190, 5, 'ORDEN DE TRABAJO', 'LR', '', 'C');
		$this->Ln();
		$this->Cell(190, 5, "", 'BRL', '', 'C');
		$this->Ln();

		$this->Ln();

		$this->SetFont('Helvetica', '', 9);
		$this->Cell(30, 5, 'SEMANA: ', 'TL', '', 'L');
		$this->Cell(160, 5, utf8_decode($entidad->semana), 'RTL', '', 'L');
		$this->Ln();
		$this->Cell(30, 5, 'PLAN: ', 'TL', '', 'L');
		$this->Cell(160, 5, utf8_decode($entidad->nombre_plan), 'RTL', '', 'L');
		$this->Ln();
		$this->Cell(30, 5, 'AREA: ', 'TL', '', 'L');
		$this->Cell(160, 5, utf8_decode($entidad->area), 'RTL', '', 'L');
		$this->Ln();
		$this->Cell(30, 5, 'SUBAREA: ', 'TL', '', 'L');
		$this->Cell(160, 5, utf8_decode($entidad->subarea), 'RTL', '', 'L');
		$this->Ln();		
		$this->Cell(30, 5, 'EQUIPO: ', 'TLB', '', 'L');
		$this->Cell(160, 5, utf8_decode($entidad->equipo_actividad), 'RTLB', '', 'L');
		$this->Ln();
		$this->Cell(30, 5, 'Actividad: ', 'TLB', '', 'L');
		$this->Cell(160, 5, utf8_decode('falta dato ...'), 'RTLB', '', 'L');
		$this->Ln();
		$this->Ln();
		$this->Cell(190, 3, '', '', '', '');
		$this->Ln();

		$this->SetFont('Helvetica', '', 9);
		$this->Cell(94, 5, 'Fecha inicio: '. utf8_decode($entidad->fecha_inicio), 'RTLB', '', 'C');
		$this->Cell(2, 5, '', 'RL', '', 'C');
		$this->Cell(94, 5, 'Fecha termino: '. utf8_decode($entidad->fecha_termino), 'RTLB', '', 'C');
		$this->Ln();
		$this->Cell(190, 3, '', '', '', '');
		$this->Ln();

		$this->SetFont('Arial', 'B', 9);
		$this->Cell(47, 5, utf8_decode('Tipo de Mantención: '), 'RTLB', '', 'L');
		$this->SetFont('Helvetica', '', 9);
		$this->Cell(47, 5, utf8_decode($entidad->tipo_mantencion), 'RTLB', '', 'C');
		$this->Ln();
		$this->Cell(190, 3, '', '', '', '');
		$this->Ln();

		$this->SetFont('Arial', 'B', 9);
		$this->Cell(190, 5, utf8_decode('Descripción de la actividad'), 'TLR', '', 'L');
		$this->SetFont('Helvetica', '', 9);
		$this->Ln();
		$this->MultiCell(190, 5, utf8_decode(utf8_decode($entidad->descripcion)), 1);
		$this->Ln();
		$this->Cell(190, 1, '', '', '', '');
		$this->Ln();
		// Repuestos utilizados
		$this->SetFont('Arial', 'B', 9);
		$this->Cell(190, 5, utf8_decode('Repuestos utilizados'), 'TLR', '', 'L');
		$this->SetFont('Helvetica', '', 9);
		$this->Ln();
		
		// ---------------------------------------------------------------------------------
		// Seccion repuestos.
		// ---------------------------------------------------------------------------------		
		//var_dump($repuestos);
		
		if($repuestos !== FALSE){
			foreach($repuestos as $repuesto){
				$this->Cell(20, 5, $repuesto->cantidad, 'RTL', '', 'L');
				$this->Cell(170, 5, $repuesto->repuesto, 'RTL', '', 'L');
				$this->Ln();
			}
		}else{
			$this->Cell(190, 5, utf8_decode('* Pendiente de informar repuestos utilizados, se ingresan una vez ejecutada la actividad de mantención.'), 'TLR', '', 'L');
			$this->Ln();
		}
		
		// ---------------------------------------------------------------------------------
		
		$this->Cell(190, 5, '', 'T', '', '');
		$this->Ln();

		$this->SetFont('Arial', 'B', 9);
		$this->Cell(190, 5, utf8_decode('Observaciones'), 'TLR', '', 'L');
		$this->SetFont('Helvetica', '', 9);
		$this->Ln();
		$this->MultiCell(190, 5, utf8_decode($entidad->observacion), 1);
		$this->Ln();

		$this->Cell(94, 5, 'REALIZADA POR TECNICO', 'RTLB', '', 'C');
		$this->Cell(2, 5, '', 'RL', '', 'C');
		$this->Cell(94, 5, 'SUPERVISADO POR', 'RTLB', '', 'C');
		$this->Ln();
		$this->Cell(94, 20, 'firma digital ...', 'RTLB', '', 'C');
		$this->Cell(2, 5, '', 'RL', '', 'C');
		$this->Cell(94, 20, 'firma digital ...', 'RTLB', '', 'C');
		$this->Ln();
		$this->Cell(94, 5, utf8_decode($entidad->tecnico), 'RLB', '', 'C');
		$this->Cell(2, 5, '', 'RL', '', 'C');
		$this->Cell(94, 5, utf8_decode($entidad->supervisor), 'RLB', '', 'C');

		$this->Ln();
		//$this->SetY(-4);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,utf8_decode('Gestión del mantenimiento'),0,0,'C');
	}

	public function reporteSemanal($semana, $data){
		$this->Image('assets/image/logo1.png',15,8,40,25);
		$this->SetFont('Helvetica', '', 12);
		$this->Cell(40, 5, '', '', '', 'C');
		$this->Cell(120, 5, 'AGRICOLA SANTA MARTA DE LIRAY S.A.', '', '', 'C');
		$this->Cell(30, 5, "", '', '', 'C');
		$this->Ln();
		$this->Cell(40, 5, '', 0, '', 'C');
		$this->Cell(120, 5, utf8_decode('AVÍCOLA'), 0, '', 'C');
		$this->Cell(30, 5, "", '', '', 'C');
		$this->Ln();
		$this->SetFont('Helvetica', '', 12);
		$this->Cell(40, 5, '', 0, '', 'C');
		$this->Cell(120, 5, utf8_decode('UNIDAD DE MANTENCIÓN'), 0, '', 'C');
		$this->Cell(30, 5, "", '', '', 'C');
		$this->Ln();
		$this->Cell(40, 5, '', 0, '', 'C');
		$this->Cell(120, 5, '', 0, '', 'C');
		$this->Cell(30, 5, "", '', '', 'C');
		$this->Ln();
		$this->Cell(190, 3, '', '', '', '');
		$this->Ln();
		$this->Cell(190, 5, "", 'TRL', '', 'C');
		$this->Ln();
		$this->Cell(190, 5, 'PROGRAMA SEMANA ' . $semana, 'LR', '', 'C');
		$this->Ln();
		$this->Cell(190, 5, "", 'BRL', '', 'C');
		$this->Ln();
		$this->Ln();

		// programa
		$this->SetFont('Arial', 'b', 9);
		$this->Cell(20, 5, 'SEMANA', 'TLR', '', 'L');
		$this->Cell(70, 5, 'AREA', 'TLR', '', 'L');
		$this->Cell(10, 5, 'COD', 'TLR', '', 'L');
		$this->Cell(90, 5, 'EQUIPO', 'TLR', '', 'L');
		$this->Ln();
		$this->SetFont('Arial', '', 8);
		foreach($data as $item){
			$this->Cell(20, 5, utf8_decode($item->semana), 'TLR', '', 'L');
			$this->Cell(70, 5, utf8_decode($item->area), 'TLR', '', 'L');
			$this->Cell(10, 5, utf8_decode('EQ'.$item->id_equipo), 'TLR', '', 'L');
			$this->Cell(90, 5, utf8_decode($item->equipo_actividad), 'TLR', '', 'L');
			$this->Ln();
		}
		$this->Cell(190, 5, '', 'T', '', '');
		$this->Ln();
		$this->Ln();
		//$this->SetY(-4);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,utf8_decode('Gestión del mantenimiento'),0,0,'C');
	}
}
?>