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
class PdfIncidenciaController extends Controller
{
    public function index()
    {
       // $articulos= DB::select('SELECT * from inc_articulos ORDER by nombre_articulo ASC');
       // dd($articulos);
       // return view('incidencias.pdfincidencia', compact('articulos'));
       {
        $etiqueta=DB::selectOne('SELECT * FROM etiqueta WHERE id_etiqueta = 1 ');
        $jefe_division=session()->has('jefe_division')?session()->has('jefe_division'):false;
        $jefe_personal=session()->has('personal')?session()->has('personal'):false;
        $carrera = Session::get('carrera');
        $id_usuario = Session::get('usuario_alumno');
        $id_periodo = Session::get('periodotrabaja');
        $pdf=new PDF($orientation='P',$unit='mm',$format='Letter');
        #Establecemos los márgenes izquierda, arriba y derecha:
        $pdf->SetMargins(20, 25 , 20);
        $pdf->SetAutoPageBreak(true,25);
        $pdf->AddPage();
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(0.2);
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(40);
        $pdf->Cell(100,5,utf8_decode($etiqueta->descripcion),0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','B','11');
        $pdf->Cell(80);
        $pdf->Cell(20,4,utf8_decode('OFICIO DE COMISIÓN'),0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(125);
        $pdf->Cell(50,4,utf8_decode('Valle de Bravo, Estado de México;'),0,0,'R');
        }

        





  
//////////////////////////////NO BORRAR//////////
    $pdf->Output();
    exit();
}
    }
    

