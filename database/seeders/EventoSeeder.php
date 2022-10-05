<?php

namespace Database\Seeders;

use App\Models\Conferencista;
use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Evento::create( [   'dia' => 1,
                            'fecha' => '17/05/2022', 
                            'horario' => '04:00 PM - 05:00 PM', 
                            'tema' => 'Redes Neuronales Convolucionales en Imagenología Médica', 
                            'conferencista_id' => Conferencista::where('nombre', 'Hector Gabriel Acosta Mesa')->first()->id, 
                            'lugar' => 'Sala de Conferencias',
                            'enlaceVirtual' => 'meet.google.com/aig-neks-bfq',  
                            'colaborador' => '',  
                            'tipoEvento' => 'CONFERENCIA',  
       ]);

       Evento::create( [    'dia' => 1,
                            'fecha' => '17/05/2022', 
                            'horario' => '06:00 PM - 07:00 PM', 
                            'tema' => 'Las ciudades inteligentes desde la perspectiva de los datos abiertos', 
                            'conferencista_id' => Conferencista::where('nombre', 'Gina Paola Maestre')->first()->id, 
                            'lugar' => 'Sala de Conferencias',
                            'enlaceVirtual' => 'meet.google.com/aig-neks-bfq',  
                            'colaborador' => '',  
                            'tipoEvento' => 'CONFERENCIA',  
]);

}
}
