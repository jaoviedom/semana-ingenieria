<?php

namespace Database\Seeders;

use App\Models\Conferencista;
use Illuminate\Database\Seeder;

class ConferencistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Conferencista::create( ['nombre' => 'Hector Gabriel Acosta Mesa', 
                                'pais' => 'mx', 
                                'cv' => 'Doctor en Inteligencia Artificial. Universidad de Sheffield. Reino Unido.
                                Maestría en Inteligencia Artificial. Universidad Veracruzana. México.
                                Ingeniero en Sistemas Computacionales. Instituto Tecnológico de Veracruz. México.
                                Docente Investigador universitario', 
                                'correo' => 'heacosta@uv.mx',
                                'foto' => 'Foto de Hector Acosta',  
       ]);

        Conferencista::create( ['nombre' => 'Gina Paola Maestre', 
                                'pais' => 'co', 
                                'cv' => 'Gina Paola Maestre Góngora es Doctora en Ingeniería de Sistemas y Computación de la Universidad del Norte y Magister en Informática y Ciencias de la Computación e Ingeniera de Sistemas de la Universidad Industrial de Santander.
                                Actualmente es Profesora/investigadora de la Facultad de Ingeniería de la Universidad Cooperativa de Colombia, Campus Medellín y profesora de posgrados relacionados con: Gestión de la tecnología de la información, Gobierno de Tecnología Informática y Gerencia de la información. Es Investigadora Asociada y par Evaluador del Ministerio de Ciencia, Tecnología e Innovación de Colombia. Su interés de investigación es: Ciudades y Gobiernos inteligentes, Gestión de la Tecnología de la Información, Análisis de Datos y Arquitectura Empresarial.', 
                                'correo' => 'gina.maestre@campusucc.edu.co',
                                'foto' => 'Foto de Gina Maestre',  
       ]);
       

    }
}
