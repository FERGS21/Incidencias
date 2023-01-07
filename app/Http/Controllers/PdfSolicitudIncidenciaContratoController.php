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
    public function index1($id_solicitud)
    {
        $solicitud=DB::selectOne('select gnral_personales.nombre, inc_solicitudes.motivo_oficio, inc_articulos.descripcion_art, inc_articulos.nombre_articulo 
        FROM inc_solicitudes, inc_articulos, gnral_personales
        WHERE inc_solicitudes.id_personal=gnral_personales.id_personal and inc_solicitudes.id_articulo=inc_articulos.id_articulo and id_solicitud='.$id_solicitud.'');

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
        $pdf->Cell(40);
        $etiqueta=DB::selectOne('SELECT * FROM etiqueta WHERE id_etiqueta = 1 ');
        $pdf->Cell(100,5,utf8_decode($etiqueta->descripcion),0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','B','11');
        $pdf->Cell(80);
        $pdf->Cell(20,4,utf8_decode('OFICIO DE INCIDENCIAS'),0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','','8');
        $pdf->Cell(125);
        $pdf->Cell(50,4,utf8_decode('Valle de Bravo, México.'),0,0,'R');
        $pdf->Ln();
        $pdf->SetFont('Arial','','9');
        $pdf->Cell(147);
        $numero=$id_solicitud;
        $pdf->Cell(28,4,utf8_decode('No. de Oficio '.$numero),0,0,'R');
        //fecha
        $fechas = date("Y-m-d");
    
        $num=date("j",strtotime($fechas));
        $ano=date("Y", strtotime($fechas));
        $mes= array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
        $mes=$mes[(date('m', strtotime($fechas))*1)-1];
        $fech= $num. ' de '.$mes.' del '.$ano;
        $pdf->Ln(4);
        $pdf->SetFont('Arial','','9');
        $pdf->Cell(135);
        $pdf->Cell(40,4,utf8_decode($fech),0,0,'R');
    
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
    $pdf->Cell(80,5,utf8_decode('Por   medio   del   presente   me   permito   enviarle   un   coordial   saludo,  y   al   mismo   tiempo'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial','','11');
    $pdf->Cell(80,5,utf8_decode('solicitar  a  usted   de   la   manera  más   atenta   y   amable,  que   con  fundamento   en   la'),0,0,'');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode(''.$solicitud->nombre_articulo.' estipulado  en  el  Contrato  Colectivo  del'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Trabajo firmado entre el TESVB y el Sindicato de trabajadores Academicos y Administrativos. Que '),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('a la letra dice '.$solicitud->descripcion_art.'. Con lo anterior mencionado solicito '.$solicitud->motivo_oficio.' que se llevara a cabo el (FECHA/DATOS'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('(INGRESADOS EN SISTEMA.)'),0,0,'');
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

public function index2($id_solicitud)
{
    $solicitud=DB::selectOne('select gnral_personales.nombre, inc_solicitudes.motivo_oficio, inc_articulos.descripcion_art, inc_articulos.nombre_articulo 
    FROM inc_solicitudes, inc_articulos, gnral_personales
    WHERE inc_solicitudes.id_personal=gnral_personales.id_personal and inc_solicitudes.id_articulo=inc_articulos.id_articulo and id_solicitud='.$id_solicitud.'');

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
    $pdf->Cell(40);
    $etiqueta=DB::selectOne('SELECT * FROM etiqueta WHERE id_etiqueta = 1 ');
    $pdf->Cell(100,5,utf8_decode($etiqueta->descripcion),0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','B','11');
    $pdf->Cell(80);
    $pdf->Cell(20,4,utf8_decode('OFICIO DE INCIDENCIAS'),0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','','8');
    $pdf->Cell(125);
    $pdf->Cell(50,4,utf8_decode('Valle de Bravo,México.'),0,0,'R');
    $pdf->Ln();
    $pdf->SetFont('Arial','','9');
    $pdf->Cell(147);
    $numero=$id_solicitud;
    $pdf->Cell(28,4,utf8_decode('No. de Oficio '.$numero),0,0,'R');
    //fecha
    $fechas = date("Y-m-d");

    $num=date("j",strtotime($fechas));
    $ano=date("Y", strtotime($fechas));
    $mes= array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
    $mes=$mes[(date('m', strtotime($fechas))*1)-1];
    $fech= $num. ' de '.$mes.' del '.$ano;
    $pdf->Ln(4);
    $pdf->SetFont('Arial','','9');
    $pdf->Cell(135);
    $pdf->Cell(40,4,utf8_decode($fech),0,0,'R');

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
    $pdf->Cell(80,5,utf8_decode('la manera más atenta y amable, que con fundamento en el '.$solicitud->nombre_articulo.' estipulado en el '),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Reglamento Interno del Trabajo del Tecnológico de Estudios Superiores de Valle de Bravo.'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Que a la letra dice '.$solicitud->descripcion_art.'.'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Con lo anterior mencionado solicito '.$solicitud->motivo_oficio.' que se llevara a cabo el (FECHA/DATOS)'),0,0,'');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('INGRESADOS EN SISTEMA.)'),0,0,'');
    $pdf->Ln(7);
    $pdf->SetFont('Arial', '', '11');
    $pdf->Cell(80, 5,utf8_decode('Sin otro particular por el momento, quedó de usted.'),0,0,'');

    $pdf->Ln(60);
    $financiero= DB::selectOne('SELECT abreviaciones.titulo,gnral_personales.nombre,gnral_unidad_administrativa.jefe_descripcion from abreviaciones_prof,abreviaciones,gnral_personales,gnral_unidad_personal,gnral_unidad_administrativa WHERE abreviaciones.id_abreviacion=abreviaciones_prof.id_abreviacion and abreviaciones_prof.id_personal=gnral_personales.id_personal and gnral_personales.id_personal=gnral_unidad_personal.id_personal and gnral_unidad_administrativa.id_unidad_admin=gnral_unidad_personal.id_unidad_admin and gnral_unidad_administrativa.id_unidad_admin=22');
    $titulo_fin=$financiero->titulo;
    $nom_fin=$financiero->nombre;
    $jefe_fin=$financiero->jefe_descripcion;
    $jefes= DB::selectOne('select count(oc_oficio_personal.id_oficio_personal) personas,gnral_personales.id_personal from oc_oficio_personal,gnral_personales,gnral_unidad_personal where oc_oficio_personal.id_personal=gnral_personales.id_personal and gnral_personales.id_personal = gnral_unidad_personal.id_personal ');
    $jefess=$jefes->personas;

        $pdf->Cell(85);
        $pdf->SetFont('Arial', 'B', '11');
        $pdf->Cell(15, 10, utf8_decode('A T E N T A M E N T E'), 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->Cell(85);
        $pdf->SetFont('Arial', 'B', '11');
        $pdf->Cell(15, 10, utf8_decode(''.$titulo_fin.' '.$solicitud->nombre.''), 0, 0, 'C');
           
        $pdf->Ln(45);
        $pdf->Cell(45);
        $pdf->SetFont('Arial', 'B', '11');
        $pdf->Cell(20, 10, utf8_decode('Firma de autorización'), 0, 0, 'R');
        $pdf->Cell(65);
                        $pdf->SetFont('Arial', 'B', '11');
                        $pdf->Cell(5, 10, utf8_decode(''.$jefess.''), 0, 0, 'L');
    } 
//////////////////////////////NO BORRAR//////////
$pdf->Output();
exit();
}
    }


