<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf as FPDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
class PDF extends FPDF
{

    //CABECERA DE LA PAGINA
    function Header()
    {
        if (count($this->pages) === 1) {
            $this->Image('img/logo3.PNG', 120, 5, 80);
            $this->Image('img/edom.png', 20, 5, 50);
            $this->Ln();
        }
    }
    //PIE DE PAGINA
    function Footer()
    {
        if (count($this->pages) === 1) {
            $this->SetY(-25);
            $this->SetFont('Arial', '', 6);
            $this->Cell(100);
            $this->Image('img/personal.PNG', 15, 240, 190);
        }
    }
}
class pdf_incidencias extends Controller{
    public function index($id_oficio){
        #Establecemos los márgenes izquierda, arriba y derecha:
        $pdf->SetMargins(20, 25 , 20);
        $pdf->SetAutoPageBreak(true,25);
        $pdf->AddPage();
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(0.2);
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(40);
        $pdf->Cell(100,5,utf8_decode($etiqueta->descripcion),0,0,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','B','11');
        $pdf->Cell(80);
        $pdf->Cell(20,5,utf8_decode('SOLICITUD DE OFICIO'),0,0,'C');
        $pdf->Ln(1);
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(130);
        $pdf->Cell(20,4,utf8_decode('Valle de Bravo, Estado de México;'),0,0,'L');



        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', '9');
        $pdf->Cell(80, 5, utf8_decode('DEL TECNOLÓGICO DE ESTUDIOS'), 0, 0, '');
        $pdf->Ln(5);
        $pdf->Cell(80, 5, utf8_decode('SUPERIORES DE VALLE DE BRAVO'), 0, 0, '');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','','10');
        $pdf->Cell(80,10,utf8_decode('Hago propicia la ocasión para enviarle un cordial saludo, así mismo aprovecho la oportunidad para solicitar el día:'),0,0,'');
        $pdf->Ln(10);
        $pdf->Cell(80,10,utf8_decode(',ya que por cuestiones de carácter personal no podré presentarme a laborar.'),0,0,'');
        $pdf->Ln(10);
        $pdf->Cell(80,10,utf8_decode('Lo anterior con fundamento en el primer  párrafo de(l) ,'),0,0,'');
        $pdf->Ln(10);
        $pdf->Cell(80,10,utf8_decode('firmado entre el Tecnológico de Estudios Superiores de Valle de Bravo, y el Sindicato de Trabajadores Académicos y Administrativos del Tecnológico de Estudios Superiores de Valle de Bravo, que a letra dice'),0,0,'');

        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', '10');
        $pdf->MultiCell(175, 5,utf8_decode('Sin otro particular por el momento, quedo de usted.'));


        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', '8');
        $pdf->Cell(45, 10, utf8_decode('A T E N T A M E N T E'), 0, 0, 'L');
        $pdf->Cell(40);
        $pdf->SetFont('Arial', '', '8');
        $pdf->Cell(15, 10, utf8_decode('FIRMA DE AUTORIZACIÓN'), 0, 0, 'L');

        $pdf->Ln(15);
        $pdf->Cell(85);
        $pdf->SetFont('Arial', 'B', '8');
        $pdf->Cell(15, 10, utf8_decode('Fecha, Hora y Firma de Recepcion del servidor Publico'), 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Output();
        exit();
    }
}
