<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Conferencista;
use App\Models\Dia;
use App\Models\Calificacion;
use Illuminate\Http\Request;
use QrCode;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $cDia1 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'CONFERENCIA')
                            ->where('dia', 1)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $cDia2 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'CONFERENCIA')
                            ->where('dia', 2)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $cDia3 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'CONFERENCIA')
                            ->where('dia', 3)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $cDia4 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'CONFERENCIA')
                            ->where('dia', 4)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $tDia1 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'TALLER')
                            ->where('dia', 1)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $tDia2 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'TALLER')
                            ->where('dia', 2)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $tDia3 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'TALLER')
                            ->where('dia', 3)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $tDia4 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'TALLER')
                            ->where('dia', 4)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $pDia1 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'PONENCIA')
                            ->where('dia', 1)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $pDia2 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'PONENCIA')
                            ->where('dia', 2)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $pDia3 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'PONENCIA')
                            ->where('dia', 3)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        $pDia4 = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->orderBy('fecha', 'asc')
                            ->orderBy('horario', 'asc')
                            ->where('tipoEvento', 'PONENCIA')
                            ->where('dia', 4)
                            ->select('eventos.*', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.id as idConferencista')
                            ->get();
        return view('welcome', compact('cDia1', 'cDia2', 'cDia3', 'cDia4', 'tDia1', 'tDia2', 'tDia3', 'tDia4', 'pDia1', 'pDia2', 'pDia3', 'pDia4'));
    }

    public function index()
    {
        $eventos = Evento::paginate(5);
        $datos['eventos'] = Evento::paginate(5);
        return view('evento.index', compact('datos', 'eventos' ));         
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dias = Dia::all();
        $conferencistas = Conferencista::orderBy('nombre', 'asc')->get();
        return view('evento.create', compact('dias', 'conferencistas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //
        // $campos = [
        //     'dia' => 'required', 
        //     'horario' => 'required|string|max:100', 
        //     'tema' => 'required|string', 
        //     'conferencista_id' => 'required', 
        //     'lugar' => 'required|string|max:200', 
        //     'enlaceVirtual' => 'required|string|max:200', 
        //     'colaborador' => 'string|max:100', 
        //     'tipoEvento' => 'required', 
        // ];

        // $mensajes = [
        //     'required' => 'El :attribute es requerido', 
        //     'fecha.required' => 'La fecha es requerida' 
        // ];

        // $this->validate( $request, $campos, $mensajes );

        $datosEvento = request()->except( '_token' );
        $dia = Dia::where('numero', $request->dia)->first();
        $fecha = $dia->fecha;
        $evento = new Evento();
        $evento->dia = $dia->numero;
        $evento->fecha = $fecha;
        $evento->horario = $request->horario;
        $evento->tema = $request->tema;
        $evento->conferencista_id = $request->conferencista_id;
        $evento->lugar = $request->lugar;
        $evento->enlaceVirtual = $request->enlaceVirtual;
        $evento->colaborador = $request->colaborador;
        $evento->tipoEvento = $request->tipoEvento;
        $evento->save();

        return redirect( 'evento' )->with( 'mensaje', 'Evento agregado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
        $evento = Evento::findOrFail($id);
        return view('evento.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $dias = Dia::all();
        $evento = Evento::findOrFail( $id );
        $conferencistas = Conferencista::orderBy('nombre', 'asc')->get();
        return view('evento.edit', compact( 'evento', 'dias', 'conferencistas' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $campos = [
        //     'dia' => 'required', 
        //     'fecha' => 'required|string|max:10', 
        //     'horario' => 'required|string|max:100', 
        //     'tema' => 'required|string', 
        //     'conferencista_id' => 'required', 
        //     'lugar' => 'required|string|max:200', 
        //     'enlaceVirtual' => 'required|string|max:200', 
        //     'colaborador' => 'required|string|max:100', 
        //     'tipoEvento' => 'required', 
        // ];

        // $mensajes = [
        //     'required' => 'El :attribute es requerido', 
        //     'fecha.required' => 'La fecha es requerida' 
        // ];

        // $this->validate( $request, $campos, $mensajes );

        $datosEvento = request()->except( ['_token', '_method'] );

        Evento::where( 'id', "=", $id )->update( $datosEvento );
        return redirect('evento' )->with( 'mensaje', 'Evento modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //
        $conferencista = Evento::findOrFail( $id );
        Evento::destroy( $id );

        return redirect('evento')->with( 'mensaje', 'Evento eliminado con éxito');;

    }

    public function enlaceCalificacion($id)
    {
        $ruta = "http://semanaingenieriaucc.desarrollandoapps.net/eventos/calificar/$id";
        $evento = Evento::join('conferencistas', 'eventos.conferencista_id', 'conferencistas.id')
                            ->where('eventos.id', $id)
                            ->select('eventos.tema', 'conferencistas.nombre', 'conferencistas.pais', 'conferencistas.foto')
                            ->first();
        QrCode::generate($ruta, '../public/qrcodes/qrcode' . $id . '.svg');
        $rutaArchivo = 'qrcodes/qrcode' . $id . '.svg';
        return view('qr-calificacion', compact('evento', 'rutaArchivo'));
    }

    public function verCalificarEvento($evento)
    {
        $evento = Evento::find($evento);
        return view('calificar-evento', compact('evento'));
    }

    public function calificarEvento(Request $request)
    {
        $calificacion = request()->except( '_token' );
        Calificacion::insert($calificacion);
        return redirect()->route('welcome')->with( 'mensaje', 'Se ha recibido su calificación');
    }
}
