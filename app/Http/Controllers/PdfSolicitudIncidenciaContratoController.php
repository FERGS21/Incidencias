<?php
namespace App\Http\Controllers;
use Codedge\Fpdf\Fpdf\Fpdf as FPDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
        if (count($this->pages) === 1) {-
            $this->SetY(-25);
            $this->SetFont('Arial', '', 6);
            $this->Cell(100);
            $this->Image('img/personal.PNG', 15, 240, 190);
        }
    }
}
class PdfSolicitudIncidenciaContratoController extends Controller
{
    public function index1()
    {
        $etiqueta=DB::selectOne('SELECT * FROM etiqueta WHERE id_etiqueta = 1 ');
       // $articulos= DB::select('SELECT * from inc_articulos ORDER by nombre_articulo ASC');
       // dd($articulos);
       // return view('incidencias.pdfincidencia', compact('articulos'));
       {
        $pdf=new PDF($orientation='P',$unit='mm',$format='Letter');
        #Establecemos los márgenes izquierda, arriba y derecha:
        $pdf->SetMargins(20, 25 , 20);
        $pdf->SetAutoPageBreak(true,25);
        $pdf->AddPage();
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(0.2);
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(40);
        $pdf->Ln();
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(80);
        $pdf->Cell(20,4,utf8_decode('"2022 Año del Quincentenario de Toluca, Capital del Estado de México"'),0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','B','11');
        $pdf->Cell(80);
        $pdf->Cell(20,4,utf8_decode('OFICIO DE INCIDENCIAS'),0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(125);
        $pdf->Cell(50,4,utf8_decode('Valle de Bravo, México.'),0,0,'R');
        $pdf->Ln();
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(125);
        $pdf->Cell(50,4,utf8_decode('Fecha actual:'),0,0,'R');
        $pdf->Ln();
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(125);
        $pdf->Cell(50,4,utf8_decode('No. de oficio:'),0,0,'R');
        $pdf->Ln();
        $pdf->SetFont('Arial','B','11');
        $pdf->Cell(80, 5, utf8_decode('Nombre a quien va dirigido'), 0, 0, '');
        $pdf->Ln(5);
        $pdf->Cell(80, 5, utf8_decode('Cargo'), 0, 0, '');
        $pdf->Ln();
        $pdf->SetFont('Arial','B','11');
        $pdf->Cell(80, 5, utf8_decode('DEL TECNOLÓGICO DE ESTUDIOS'), 0, 0, '');
        $pdf->Ln(5);
        $pdf->Cell(80, 5, utf8_decode('SUPERIORES DE VALLE DE BRAVO'), 0, 0, '');
        $pdf->Ln();
        $pdf->SetFont('Arial','B','11');
        $pdf->Cell(80, 5, utf8_decode('PRESENTE'), 0, 0, '');

        $pdf->Ln(10);
    $pdf->SetFont('Arial','','11');
    $pdf->Cell(80,5,utf8_decode('Por medio del presente me permito enviarle un coordial saludo,y al mismo tiempo solicitar a usted de'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial','','11');
    $pdf->Cell(80,5,utf8_decode('la manera más atenta y amable, que con fundamento en el (Clausula Aplicada) estipulado en el Contrato '),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Colectivo del Trabajo firmado entre el TESVB y el Sindicato de trabajadores Academicos y Administrativos.'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Que a la letra dice. (DESCRIPCIÓN DE LA CLAUSULA).'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Con lo anterior mencionado solicito (MOTIVO DEL OFICIO) que se llevara a cabo el (FECHA/DATOS'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('INGRESADOS EN SISTEMA.)'),0,0,'');
    $pdf->Ln(7);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Sin otro particular por el momento, quedó de usted.'),0,0,'');

    $pdf->Ln(60);
            $pdf->Cell(85);
            $pdf->SetFont('Arial', 'B', '11');
            $pdf->Cell(15, 10, utf8_decode('A T E N T A M E N T E'), 0, 0, 'C');
    $pdf->Ln(45);
            $pdf->Cell(45);
            $pdf->SetFont('Arial', 'B', '11');
            $pdf->Cell(20, 10, utf8_decode('Firma de autorización'), 0, 0, 'R');
            $pdf->Cell(65);
                            $pdf->SetFont('Arial', 'B', '11');
                            $pdf->Cell(5, 10, utf8_decode('Vo. Bo. D.A.P'), 0, 0, 'L');
        } 
//////////////////////////////NO BORRAR//////////
    $pdf->Output();
    exit();
}

public function index2()
{
    
   // $articulos=DB::select('SELECT * from inc_articulos ORDER by nombre_articulo ASC');
   // dd($articulos);
   // return view('incidencias.pdfincidencia', compact('articulos'));
   {
    $pdf=new PDF($orientation='P',$unit='mm',$format='Letter');
    #Establecemos los márgenes izquierda, arriba y derecha:
    $pdf->SetMargins(20, 25 , 20);
    $pdf->SetAutoPageBreak(true,25);
    $pdf->AddPage();
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(0.2);
    $pdf->SetFont('Arial','','8');
    $pdf->Cell(40);
    
    $pdf->Ln();
    $pdf->SetFont('Arial','','8');
    $pdf->Cell(80);
    $pdf->Cell(20,4,utf8_decode('"2022 Año del Quincentenario de Toluca, Capital del Estado de México"'),0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(80);
    $pdf->Cell(20,4,utf8_decode('OFICIO DE INCIDENCIAS'),0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','','8');
    $pdf->Cell(125);
    $pdf->Cell(50,4,utf8_decode('Valle de Bravo,México.'),0,0,'R');
    $pdf->Ln();
    $pdf->SetFont('Arial','','8');
    $pdf->Cell(125);
    $pdf->Cell(50,4,utf8_decode('Fecha actual:'),0,0,'R');
    $pdf->Ln();
    $pdf->SetFont('Arial','','8');
    $pdf->Cell(125);
    $pdf->Cell(50,4,utf8_decode('No. de oficio:'),0,0,'R');
    $pdf->Ln();
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(80, 5, utf8_decode('Nombre a quien va dirigido'), 0, 0, '');
    $pdf->Ln(5);
    $pdf->Cell(80, 5, utf8_decode('Cargo'), 0, 0, '');
    $pdf->Ln();
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(80, 5, utf8_decode('DEL TECNOLÓGICO DE ESTUDIOS'), 0, 0, '');
    $pdf->Ln(5);
    $pdf->Cell(80, 5, utf8_decode('SUPERIORES DE VALLE DE BRAVO'), 0, 0, '');
    $pdf->Ln();
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(80, 5, utf8_decode('PRESENTE'), 0, 0, '');

    $pdf->Ln(10);
$pdf->SetFont('Arial','','11');
$pdf->Cell(80,5,utf8_decode('Por medio del presente me permito enviarle un coordial saludo,y al mismo tiempo solicitar a usted de'),0,0,'');
$pdf->Ln(5);
$pdf->SetFont('Arial','','11');
$pdf->Cell(80,5,utf8_decode('la manera más atenta y amable, que con fundamento en el (Articulo Aplicado) estipulado en el '),0,0,'');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', '11');
$pdf->Cell(80, 5,utf8_decode('Reglamento Interno del Trabajo del Tecnológico de Estudios Superiores de Valle de Bravo.'),0,0,'');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', '11');
$pdf->Cell(80, 5,utf8_decode('Que a la letra dice. (DESCRIPCIÓN DEL ARTICULO).'),0,0,'');
$pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Con lo anterior mencionado solicito (MOTIVO DEL OFICIO) que se llevara a cabo el (FECHA/DATOS'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('INGRESADOS EN SISTEMA.)'),0,0,'');
$pdf->Ln(7);
$pdf->SetFont('Arial', '', '11');
$pdf->Cell(80, 5,utf8_decode('Sin otro particular por el momento, quedó de usted.'),0,0,'');

$pdf->Ln(60);
        $pdf->Cell(85);
        $pdf->SetFont('Arial', 'B', '11');
        $pdf->Cell(15, 10, utf8_decode('A T E N T A M E N T E'), 0, 0, 'C');
$pdf->Ln(45);
        $pdf->Cell(45);
        $pdf->SetFont('Arial', 'B', '11');
        $pdf->Cell(20, 10, utf8_decode('Firma de autorización'), 0, 0, 'R');
        $pdf->Cell(65);
                        $pdf->SetFont('Arial', 'B', '11');
                        $pdf->Cell(5, 10, utf8_decode('Vo. Bo. D.A.P'), 0, 0, 'L');
    } 
//////////////////////////////NO BORRAR//////////
$pdf->Output();
exit();
}
    }


