<?php

namespace App\Http\Controllers;

use App\Models\CredencialEstudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use TCPDF;
use TCPDF_FONTS;

class CredencialEstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->buscar){
            $lista_credenciales = CredencialEstudiante::orwhere("nombres", "like", "%".$request->buscar."%")
                                            ->orwhere("apellidos", "like", "%".$request->buscar."%")
                                            ->paginate(10);
            return view("admin.credenciales.listar", compact("lista_credenciales"));
        }
        $lista_credenciales = CredencialEstudiante::paginate(10);
        return view("admin.credencialestudiante.listar", compact("lista_credenciales"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.credencialestudiante.nuevo");
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
        $credencial = new CredencialEstudiante;
        $credencial->nombres = $request->nombre;
        $credencial->apellido_paterno = $request->apellido_paterno;
        $credencial->apellido_materno = $request->apellido_materno;
        $credencial->cod_est = $request->cod_est;
        $credencial->carrera = $request->carrera;
        $credencial->cedula_identidad = $request->cedula_identidad;
        $credencial->ciudad = $request->ciudad;
        $credencial->fecha_nacimiento = $request->fecha_nacimiento;
        $credencial->tipo_sangre = $request->tipo_sangre;
        $credencial->correo = $request->correo;
        $credencial->celular = $request->celular;
        $credencial->imagen = $nom_imagen;
        
        $nom_enlace = $request->url() . "/" . $request->cedula_identidad . "/vista";
        $nom_qr = $request->cedula_identidad;
        
        //QrCode::size(200)->format('svg')->generate($nom_enlace, public_path('adm/images/qr_images/'.$nom_qr.'.svg'));
        //QrCode::format('png')->generate($nom_enlace, public_path('images/qr_images/'.$nom_imagen));
        QrCode::size(200)->format('svg')->generate($nom_enlace, public_path('images/qr_images/'.$nom_qr.'.svg'));
        $credencial->enlace_qr = $nom_enlace;

        $credencial->save();
        return redirect("/credencialestudiante")->with("status", "Credencial creada correctamente");
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
        $credencial = CredencialEstudiante::find($id);
        return view("admin.credencialestudiante.editar", compact('credencial'));
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
        $credencial = CredencialEstudiante::find($id);
        
        
        $credencial->nombres = $request->nombre;
        $credencial->apellido_paterno = $request->apellido_paterno;
        $credencial->apellido_materno = $request->apellido_materno;
        $credencial->cod_est = $request->cod_est;
        $credencial->carrera = $request->carrera;
        $credencial->cedula_identidad = $request->cedula_identidad;
        $credencial->ciudad = $request->ciudad;
        $credencial->fecha_nacimiento = $request->fecha_nacimiento;
        $credencial->tipo_sangre = $request->tipo_sangre;
        $credencial->correo = $request->correo;
        $credencial->celular = $request->celular;
        //archivo
        $nom_imagen = "";
        
        if($file = $request->file("imagen")){
            // nombre original del archivo
            $base_name = $credencial->imagen;
            //$nom_imagen = $file->getClientOriginalName();
            $nom_imagen = str_replace( 'fotos', '', $base_name);
            $file->move("fotos", $nom_imagen);
            $nom_imagen = "fotos/" . $nom_imagen; 
            $credencial->imagen = $nom_imagen;
        }
        
        
        
        //$nom_enlace = $request->root() . "/credencial/" . $request->cedula_identidad . "/vista";
        //$nom_qr = $request->cedula_identidad;
        //QrCode::size(200)->format('svg')->generate($nom_enlace, public_path('adm/images/qr_images/'.$nom_qr.'.svg'));

        $nom_enlace = $request->url() . "/" . $request->cedula_identidad . "/vista";
        $nom_qr = $request->cedula_identidad;
        QrCode::size(200)->format('svg')->generate($nom_enlace, public_path('images/qr_images/'.$nom_qr.'.svg'));     

        //QrCode::format('png')->generate($nom_enlace, public_path('images/qr_images/'.$nom_imagen));
        $credencial->enlace_qr = $nom_enlace;

        $credencial->save();
        return redirect("/credencialestudiante")->with("status", "Credencial modificada correctamente");
    }

    public function imprimir (Request $request, $id)
    {
        $credencial = CredencialEstudiante::find($id);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Jose Negretti');
        $pdf->SetTitle('Credencial');
        $pdf->SetSubject('Credencial');
        
        $pdf->SetMargins(0, 0, 0, 0);

        $pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

        $pdf->AddPage('L', 'CREDIT_CARD');

        $foto = $credencial->imagen;

        
        // get the current page break margin  
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);

        // set bacground image
        $pdf->Image('logo/fondo13.png', 0, 0, 86, 54, '', '', '', false, 300, '', false, false, 0);
        
        //Setear foto est
        $pdf->SetXY(60, 15);
        $pdf->Image($foto, '', '', '', 18, '', '', '', false, 300, '', false, false, 0, false, false, false);
        
        //Setear logo UNIOR
        $pdf->SetXY(0, 0);
        $pdf->Image('logo/logo_unior_blanco.png', '', '', '', 13, '', '', 'T', false, 300, 'R', false, false, 1, false, false, false);
               
        //set titulo
        $pdf->SetXY(0, 10);
        $pdf->SetFont('robotocondensedb', '', 14, '', false);
        $html = '<p style="color:white;text-align:left;">Credencial Estudiantil</p>'; 
        $pdf->setCellPaddings(5, 0, 2, 0);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'L', true);

        //set cod est
        $pdf->SetXY(0, 28);
        $pdf->SetFont('robotocondensedb', '', 16, '', false);
        $html = '<p style="color:white;text-align:left;">' .$credencial->cod_est. '</p>';
        $pdf->setCellPaddings(5, 0, 2, 0);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'L', true);

        //set nombre est
        $pdf->SetXY(0, 35);
        $stretching = 80;
        $pdf->setFontStretching($stretching);
        $pdf->SetFont('robotocondensedb', '', 15, '', false);
        $html = '<p style="color:white;text-align:left;">' .$credencial->nombres. " " .$credencial->apellido_paterno. " " .$credencial->apellido_materno.  '</p>'; 
        $pdf->setCellPaddings(5, 0, 2, 0);
        $pdf->writeHTMLCell(95, 0, '', '', $html, 0, 0, 0, true, 'J', true,);
     

        //set fecha venc
        $pdf->SetXY(0, 42);
        $stretching = 100;
        $pdf->setFontStretching($stretching);
        $pdf->SetFont('nunito', '', 8, '', false);
        $html = '<p style="color:white;text-align:left;">Valida <br/> hasta:</p>'; 
        $pdf->setCellPaddings(5, 0, 2, 0);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'L', true);

        $pdf->SetXY(0, 43);
        $pdf->SetFont('roboto', '', 10, '', false);
        $html = '<p style="color:white;text-align:left;">02/2023</p>'; 
        $pdf->setCellPaddings(16, 0, 2, 0);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'L', true);

        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();
      
        $pdf->AddPage('L', 'CREDIT_CARD');

        $pdf->setCellPaddings(5, 0, 2, 0);

       // get the current page break margin
        $bMargin = $pdf->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $pdf->getAutoPageBreak();
        // disable auto-page-break
        $pdf->SetAutoPageBreak(false, 0);
        // set bacground image
        $pdf->Image('logo/fondo_back.png', 0, 0, 86, 54, '', '', '', false, 300, '', false, false, 0);
       
      
        //set titulo
        $pdf->SetXY(0, 5);
        $pdf->SetFont('robotocondensedb', '', 14, '', false);
        $html = '<p style="color:black;text-align:left;">Datos Personales</p>'; 
        $pdf->setCellPaddings(5, 0, 2, 0);
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'L', true);

         //Datos Personales

         $pdf->SetFont('robotocondensedb', '', 10, '', false);
         $pdf->SetXY(0, 16);
         $html = '<font size="9" color="#f10003">Cedula de identidad: </font><font size="9" color="#000">'. $credencial->cedula_identidad.'</font>';
         $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'L', true);
         $pdf->SetXY(0, 21);
         $html = '<font size="9" color="#f10003">Fecha de nacimiento: </font><font size="9" color="#000">'. $credencial->fecha_nacimiento.'</font>';
         $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 2, 0, true, 'L', true);
         $pdf->SetXY(0, 26);
         $html = '<font size="9" color="#f10003">Tipo de sangre: </font><font size="9" color="#000">'. $credencial->tipo_sangre.'</font>';
         $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'L', true);
         $pdf->SetXY(0, 31);
         $html = '<font size="9" color="#f10003">Correo electrónico: </font><br/><font size="8" color="#000">'.$credencial->correo.'</font>';
         $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, 'L', true);

        //Imagen QR
        $pdf->SetXY(60,17);
        $qr_image = 'images/qr_images/'.$credencial->cedula_identidad.'.svg';
        $pdf->ImageSVG($qr_image, '', '', 20, '', '', '', 'T', false, 300, 'C', false, false, 1, false, false, false);

    
       
        

        // restore auto-page-break status
        $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $pdf->setPageMark();

       
        $pdf->Output('CredencialEst'.$credencial->cod_est.'.pdf', 'I');
    }

    public function vista(Request $request, $cedula_identidad)
    {
        $credencial = CredencialEstudiante::where('cedula_identidad', $cedula_identidad)->first();
        //return $credencial;
        return view("admin.credencialestudiante.vista", compact("credencial"));
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
}
