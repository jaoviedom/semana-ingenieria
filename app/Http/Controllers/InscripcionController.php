<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionInscripcion;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AsistenciaExport;
use DateTime;
use QrCode;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscripcion($idEvento)
    {
        $evento = Evento::find($idEvento);
        return view('inscripcion', compact('evento'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        do {
            $token = bin2hex(openssl_random_pseudo_bytes(64));
        } while (Inscripcion::where('token', $token)->first() != null);


        $ins = Inscripcion::create([
            'token' => $token,
            'evento_id' => (int) $request->evento,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'celular' => $request->celular,
            'institucion' => $request->institucion,
            'nivelFormacion' => $request->nivelFormacion
        ]);

        // Mail::to($request->email)->send(new NotificacionInscripcion($inscripcion));
        
        QrCode::generate("http://semanaingenieriaucc.desarrollandoapps.net/registrar-asistencia/" . $token, '../public/qrcodes/' . $token . '.svg');

        $inscripcion = Inscripcion::join('eventos', 'inscripcions.evento_id', 'eventos.id')
                                        ->where('inscripcions.id', $ins->id)
                                        ->select('inscripcions.nombre', 'inscripcions.token', 'eventos.*')
                                        ->first();
        $rutaArchivo = 'qrcodes/' . $token . '.svg';
        return view('email.inscripcion', compact('rutaArchivo', 'inscripcion'));
        // return redirect()->route('welcome')->with(['inscrito' => true]);
    }

    public function registrarAsistencia($token)
    {
        $asiste = 0;
        $inscripcion = Inscripcion::where('token', $token)->first();

        if($inscripcion != null && $inscripcion->asiste == 0)
        {
            $asiste = 1;
            $inscripcion->asiste = $asiste;
            $inscripcion->save();
        }
        else if ($inscripcion != null && $inscripcion->asiste == 1) 
        {
            return redirect()->route('confirmacionAsistencia')->with(['asistio' => 2]);    
        }

        return redirect()->route('confirmacionAsistencia')->with(['asistio' => $asiste]);
    }

    public function exportarAsistencia()
    {
        $hoy = new DateTime();
        $hoy = $hoy->format('Y-m-d');
        $ruta = 'Informe-asistencia-' . $hoy . '.xlsx';
        return Excel::download(new AsistenciaExport, $ruta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscripcion  $inscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscripcion $inscripcion)
    {
        //
    }
}
