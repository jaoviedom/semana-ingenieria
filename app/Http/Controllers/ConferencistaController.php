<?php

namespace App\Http\Controllers;

use App\Models\Conferencista;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConferencistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferencistas = Conferencistas::all();
        $eventos = Eventos::all();
        $datos['conferencistas'] = Conferencista::paginate(5);
        $conferencistas = Conferencista::paginate(5);
        return view('conferencista.index', compact('datos', 'conferencistas', 'eventos' ));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('conferencista.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // $campos = [
        //     'nombre' => 'required|string|max:100', 
        //     'pais' => 'required|string|max:100', 
        //     'correo' => 'required|email|max:100', 
        //     'cv' => 'required|string', 
        //     'foto' => 'max:10000|mimes:jpeg,png,jpg' 
        // ];

        // $mensajes = [
        //     'required' => 'El :attribute es requerido', 
        //     'foto.required' => 'La foto es requerida' 
        // ];

        // $this->validate( $request, $campos, $mensajes );

        $datosConferencista = request()->except( '_token' );
        if( $request->hasFile('foto') ) {
            $datosConferencista['foto'] = $request->file('foto')->store( 'uploads', 'public' );
        }

        Conferencista::insert( $datosConferencista );

        //return response()->json( $datosConferencista );
        return redirect( 'conferencista' )->with( 'mensaje', 'Conferencista modificado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conferencista  $conferencista
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conferencista = Conferencista::findOrFail($id);
        return view('conferencista.show', compact('conferencista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conferencista  $conferencista
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        //
        $conferencista = Conferencista::findOrFail( $id );
        return view('conferencista.edit', compact( 'conferencista' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conferencista  $conferencista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        // 
        $campos = [
            'nombre' => 'required|string|max:100', 
            'pais' => 'required|string|max:100', 
            'correo' => 'required|email|max:100', 
            'cv' => 'required|string' 
        ];

        $mensajes = [
            'required' => 'El :attribute es requerido' 
        ];

        $this->validate( $request, $campos, $mensajes );

        if( $request->hasFile( 'foto' ) ) 
        {
            $campos = [ 'foto' => 'required|max:10000|mimes:jpeg,png,jpg' ];
            $mensajes = [
                'foto.required' => 'La foto es requerida' 
            ];    
        }

        $datosConferencista = request()->except( ['_token', '_method'] );
        if( $request->hasFile('foto') ) {
                $conferencista = Conferencista::findOrFail( $id );
                Storage::delete( 'public/' . $conferencista->foto );
                $datosConferencista['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        Conferencista::where( 'id', "=", $id )->update( $datosConferencista );
        return redirect('conferencista' )->with( 'mensaje', 'Conferencista modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conferencista  $conferencista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $conferencista = Conferencista::findOrFail( $id );
        if( Storage::delete( 'public/' . $conferencista->foto ) ) 
        {
            Conferencista::destroy( $id );
        }

        return redirect('conferencista')->with( 'mensaje', 'Conferencista eliminado con éxito');;
    }
}
