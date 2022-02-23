<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Credencial;
use Illuminate\Support\Str;

use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use TCPDF;

class CredencialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->buscar){
            $lista_credenciales = Credencial::orwhere("nombres", "like", "%".$request->buscar."%")
                                            ->orwhere("apellidos", "like", "%".$request->buscar."%")
                                            ->paginate(3);
            return view("admin.credenciales.listar", compact("lista_credenciales"));
        }
        $lista_credenciales = Credencial::paginate(3);
        return view("admin.credenciales.listar", compact("lista_credenciales"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.credenciales.nuevo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "imagen" => "required"
        ]);
        $nom_imagen = "";
        if($file = $request->file("imagen")){
            // nombre original del archivo
            $base_name = Str::random();
            //$nom_imagen = $file->getClientOriginalName();
            $nom_imagen = $base_name . '.' . $file->getClientOriginalExtension();
            $file->move("fotos", $nom_imagen);
            $nom_imagen = "fotos/" . $nom_imagen;            
        }
        $credencial = new Credencial;
        $credencial->nombres = $request->nombre;
        $credencial->apellidos = $request->apellidos;
        $credencial->cedula_identidad = $request->cedula_identidad;
        $credencial->ciudad = $request->ciudad;
        $credencial->cargo = $request->cargo;
        $credencial->fecha_nacimiento = $request->fecha_nacimiento;
        $credencial->tipo_sangre = $request->tipo_sangre;
        $credencial->correo = $request->correo;
        $credencial->celular = $request->celular;
        $credencial->imagen = $nom_imagen;
        
        $nom_enlace = $request->url() . "/" . $request->cedula_identidad . "/vista";
        $nom_qr = $request->cedula_identidad;
        QrCode::size(200)->format('svg')->generate($nom_enlace, public_path('images/qr_images/'.$nom_qr.'.svg'));
        //QrCode::format('png')->generate($nom_enlace, public_path('images/qr_images/'.$nom_imagen));
        $credencial->enlace_qr = $nom_enlace;

        $credencial->save();
        return redirect("/credencial")->with("status", "Credencial creada correctamente" .  public_path('images/qr_images/'.$nom_qr.'.svg'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $credencial = Credencial::find($id);
        return view("admin.credenciales.editar", compact('credencial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function imprimir (Request $request, $id)
    {
        $credencial = Credencial::find($id);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Jose Negretti');
        $pdf->SetTitle('Credencial');
        $pdf->SetSubject('Credencial');
        
        $pdf->SetMargins(0, 0, 0, 0);

        $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

        $pdf->AddPage('P', 'CREDIT_CARD');

        $foto = $credencial->imagen;
        //Setear foto adm
        $pdf->SetXY(0, 23);
        $pdf->Image($foto, '', '', '', 25, '', '', 'C', false, 300, 'C', false, false, 1, false, false, false);
        // get the current page break margin  
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        $pdf->Image('logo/fondo6.png', 0, 0, 54, 86, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();

        //Setear logo UNIOR
        $pdf->SetXY(13, 5);
        $pdf->Image('logo/logo_unior.png', '', '', 22, 10, '', '', 'T', false, 300, 'C', false, false, 1, false, false, false);
        //Setear la fuente
        $pdf->SetFont('helvetica', 'B', 16, '', false);
        $html = '<p style="color:white;text-align:center;">' .$credencial->nombres. '</p>'; 
        //NOMBRE
        $pdf->SetXY(0, 50);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'C', true);
        //APELLIDOS
        $pdf->SetXY(0, 57);
        $html = '<p style="color:white;text-align:center;">' .$credencial->apellidos. '</p>'; 
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'C', true);
        
        //CARGO
        $pdf->SetFont('helvetica', '', 13, '', false);
        // get the current page break margin
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);

        $pdf->SetXY(0, 65);
        $html = '<p style="color:#fdc300;text-align:center;">' .$credencial->cargo. '</p>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'C', true);
        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();

        $pdf->AddPage('P', 'CREDIT_CARD');

        // get the current page break margin
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        $pdf->Image('logo/fondo_back2.png', 0, 0, 54, 86, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();
        
        //Datos back
        $pdf->SetFont('helvetica', '', 10, '', false);
        //$pdf->setCellPaddings( 0, 2, 0, 0);
        
        // get the current page break margin
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        
        //Imagen QR
        $pdf->SetXY(17,10);
        $qr_image = 'images/qr_images/'.$credencial->cedula_identidad.'.svg';
        $pdf->ImageSVG($qr_image, '', '', 22, '', '', '', 'T', false, 300, 'C', false, false, 1, false, false, false);
        
        //Datos Personales
        $pdf->SetXY(0, 42);
        $html = '<font size="9" color="#f10003">Cedula de identidad: </font><br/><font size="9" color="#000">'. $credencial->cedula_identidad.'</font>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'C', true);
        $pdf->SetXY(0, 50);
        $html = '<font size="9" color="#f10003">Fecha de nacimiento: </font><br/><font size="9" color="#000">'. $credencial->fecha_nacimiento.'</font>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 2, 0, true, 'C', true);
        $pdf->SetXY(0, 58);
        $html = '<font size="9" color="#f10003">Tipo de sangre: </font><br/><font size="9" color="#000">'. $credencial->tipo_sangre.'</font>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'C', true);
        $pdf->SetXY(0, 66);
        $html = '<font size="9" color="#f10003">Correo electrónico: </font><br/><font size="9" color="#000">'.$credencial->correo.'</font>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'C', true);

        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();
        $pdf->Output('example_009.pdf', 'I');
    }

    public function vista(Request $request, $cedula_identidad)
    {
        $credencial = Credencial::where('cedula_identidad', $cedula_identidad)->first();
        //return $credencial;
        return view("admin.credenciales.vista", compact("credencial"));
    }
}
