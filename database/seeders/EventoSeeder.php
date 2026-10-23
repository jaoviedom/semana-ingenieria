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
        // Obtener instancias de conferencistas
        $patricia = Conferencista::where('nombre', 'like', '%Patricia Martínez%')->first();
        $tinetti = Conferencista::where('nombre', 'like', '%Fernando Tinetti%')->first();
        $vergara = Conferencista::where('nombre', 'like', '%José Antonio Vergara%')->first();
        $naranjo = Conferencista::where('nombre', 'like', '%Ricardo Naranjo%')->first();
        $alfredo = Conferencista::where('nombre', 'like', '%Alfredo Antonio Díaz%')->first();
        $decanos = Conferencista::where('nombre', 'like', '%Panel de Decanos%')->first();
        $gensti = Conferencista::where('nombre', 'like', '%Comunidad GensTI%')->first();

        // ---------------------------------------------------------------------
        // DÍA 1: Miércoles 28 de octubre de 2026
        // ---------------------------------------------------------------------
        // 1. Conferencia Inaugural IA
        Evento::updateOrCreate(
            [
                'dia' => 1,
                'fecha' => '28/10/2026',
                'horario' => '10:00 AM - 11:00 AM',
                'tema' => 'Inteligencia Artificial: presente, futuro y su impacto ético en la transformación de territorios inteligentes',
            ],
            [
                'conferencista_id' => $patricia?->id,
                'lugar' => 'Auditorio Principal UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-ia-territorios',
                'colaborador' => 'Universidad Veracruzana (México)',
                'tipoEvento' => 'CONFERENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // 2. Conferencia HPC y Robótica
        Evento::updateOrCreate(
            [
                'dia' => 1,
                'fecha' => '28/10/2026',
                'horario' => '11:00 AM - 12:00 PM',
                'tema' => 'Desarrollar con IA: proyectos de HPC y robótica',
            ],
            [
                'conferencista_id' => $tinetti?->id,
                'lugar' => 'Auditorio Principal UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-hpc-robotica',
                'colaborador' => 'Universidad Nacional de La Plata (Argentina)',
                'tipoEvento' => 'CONFERENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // 3. Conferencia Software Libre y Soberanía
        Evento::updateOrCreate(
            [
                'dia' => 1,
                'fecha' => '28/10/2026',
                'horario' => '04:00 PM - 05:00 PM',
                'tema' => 'Software libre y soberanía tecnológica en la educación',
            ],
            [
                'conferencista_id' => $vergara?->id,
                'lugar' => 'Auditorio Principal UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-software-libre',
                'colaborador' => 'Universidad Veracruzana (México)',
                'tipoEvento' => 'CONFERENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // 4. Taller Accesibilidad Web (WCAG)
        Evento::updateOrCreate(
            [
                'dia' => 1,
                'fecha' => '28/10/2026',
                'horario' => '05:00 PM - 06:00 PM',
                'tema' => 'Taller: auditoría y herramientas de evaluación de accesibilidad web (WCAG en la práctica)',
            ],
            [
                'conferencista_id' => $patricia?->id,
                'lugar' => 'Laboratorio de Sistemas UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-taller-wcag',
                'colaborador' => 'Universidad Veracruzana (México)',
                'tipoEvento' => 'TALLER',
                'programa' => 'Sistemas',
            ]
        );

        // 5. Conferencia Cibertriage
        Evento::updateOrCreate(
            [
                'dia' => 1,
                'fecha' => '28/10/2026',
                'horario' => '06:00 PM - 07:00 PM',
                'tema' => 'Cibertriage: primeros auxilios ante un hackeo',
            ],
            [
                'conferencista_id' => $naranjo?->id,
                'lugar' => 'Modalidad Remota (Virtual)',
                'enlaceVirtual' => 'https://meet.google.com/bienal-cibertriage',
                'colaborador' => 'Skina IT Solutions / Pontificia Universidad Javeriana',
                'tipoEvento' => 'CONFERENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // 6. Taller Ambientes Distribuidos
        Evento::updateOrCreate(
            [
                'dia' => 1,
                'fecha' => '28/10/2026',
                'horario' => '07:00 PM - 08:00 PM',
                'tema' => 'Taller 1: desarrollo en ambientes distribuidos virtualizados – utilización de IA',
            ],
            [
                'conferencista_id' => $tinetti?->id,
                'lugar' => 'Laboratorio de Sistemas UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-taller-distribuidos',
                'colaborador' => 'Universidad Nacional de La Plata (Argentina)',
                'tipoEvento' => 'TALLER',
                'programa' => 'Sistemas',
            ]
        );

        // ---------------------------------------------------------------------
        // DÍA 2: Jueves 29 de octubre de 2026
        // ---------------------------------------------------------------------
        // 7. Conferencia Gobernanza IA
        Evento::updateOrCreate(
            [
                'dia' => 2,
                'fecha' => '29/10/2026',
                'horario' => '08:30 AM - 09:30 AM',
                'tema' => 'Gobernanza y gestión operativa de la IA: cumplimiento normativo (marco europeo y colombiano) e implementación de ISO/IEC 42001',
            ],
            [
                'conferencista_id' => $alfredo?->id,
                'lugar' => 'Auditorio Principal UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-gobernanza-ia',
                'colaborador' => 'UCC Campus Ibagué',
                'tipoEvento' => 'CONFERENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // 8. Taller Power BI con IA
        Evento::updateOrCreate(
            [
                'dia' => 2,
                'fecha' => '29/10/2026',
                'horario' => '09:45 AM - 10:45 AM',
                'tema' => 'Taller: creación de dashboards en Power BI potenciados con IA',
            ],
            [
                'conferencista_id' => $patricia?->id,
                'lugar' => 'Laboratorio de Sistemas UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-taller-powerbi',
                'colaborador' => 'Universidad Veracruzana (México)',
                'tipoEvento' => 'TALLER',
                'programa' => 'Sistemas',
            ]
        );

        // 9. Conferencia / Taller Agentes Inteligentes
        Evento::updateOrCreate(
            [
                'dia' => 2,
                'fecha' => '29/10/2026',
                'horario' => '10:45 AM - 12:00 PM',
                'tema' => 'Orquestación de agentes inteligentes con n8n: integración de sistemas multiagente con aplicaciones móviles para proyectos de ingeniería',
            ],
            [
                'conferencista_id' => $alfredo?->id,
                'lugar' => 'Auditorio Principal UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-agentes-n8n',
                'colaborador' => 'UCC Campus Ibagué',
                'tipoEvento' => 'CONFERENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // 10. Taller Optimización de Cómputo
        Evento::updateOrCreate(
            [
                'dia' => 2,
                'fecha' => '29/10/2026',
                'horario' => '03:30 PM - 04:30 PM',
                'tema' => 'Taller 2: optimización de cómputo – utilización de IA',
            ],
            [
                'conferencista_id' => $tinetti?->id,
                'lugar' => 'Laboratorio de Sistemas UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-taller-optimizacion',
                'colaborador' => 'Universidad Nacional de La Plata (Argentina)',
                'tipoEvento' => 'TALLER',
                'programa' => 'Sistemas',
            ]
        );

        // 11. Conferencia MLOps
        Evento::updateOrCreate(
            [
                'dia' => 2,
                'fecha' => '29/10/2026',
                'horario' => '04:30 PM - 06:00 PM',
                'tema' => 'Ciclo de vida MLOps de extremo a extremo: despliegue back-to-front y gestión de modelos con MLflow',
            ],
            [
                'conferencista_id' => $alfredo?->id,
                'lugar' => 'Auditorio Principal UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-mlops-mlflow',
                'colaborador' => 'UCC Campus Ibagué',
                'tipoEvento' => 'CONFERENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // 12. Panel Decanos de Ingeniería
        Evento::updateOrCreate(
            [
                'dia' => 2,
                'fecha' => '29/10/2026',
                'horario' => '06:00 PM - 08:00 PM',
                'tema' => 'Conversatorio de decanos de ingeniería: retos y perspectivas formativas ante la transformación digital',
            ],
            [
                'conferencista_id' => $decanos?->id,
                'lugar' => 'Auditorio Principal UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-conversatorio-decanos',
                'colaborador' => 'Decanos y Directivos de Facultades de Ingeniería Invitados',
                'tipoEvento' => 'CONFERENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // ---------------------------------------------------------------------
        // DÍA 3: Viernes 30 de octubre de 2026
        // ---------------------------------------------------------------------
        // 13. Ponencia: Exhibición de Pósteres
        Evento::updateOrCreate(
            [
                'dia' => 3,
                'fecha' => '30/10/2026',
                'horario' => '09:00 AM - 11:30 AM',
                'tema' => 'Exhibición de pósteres de proyectos y trabajos finales de curso de Ingeniería de Sistemas',
            ],
            [
                'conferencista_id' => $gensti?->id,
                'lugar' => 'Plazoleta Central / Pasillos Facultad de Ingeniería',
                'enlaceVirtual' => null,
                'colaborador' => 'Comunidad GensTI y Semilleros UCC',
                'tipoEvento' => 'PONENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // 14. Ponencia: Finalistas y Premiación GensTI
        Evento::updateOrCreate(
            [
                'dia' => 3,
                'fecha' => '30/10/2026',
                'horario' => '02:00 PM - 05:00 PM',
                'tema' => 'Presentación, sustentación y premiación de pósteres finalistas de la comunidad GensTI',
            ],
            [
                'conferencista_id' => $gensti?->id,
                'lugar' => 'Auditorio Principal UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-premiacion-gensti',
                'colaborador' => 'Comunidad GensTI',
                'tipoEvento' => 'PONENCIA',
                'programa' => 'Sistemas',
            ]
        );

        // 15. Conferencia de Cierre: Articulación Sectorial
        Evento::updateOrCreate(
            [
                'dia' => 3,
                'fecha' => '30/10/2026',
                'horario' => '05:00 PM - 06:30 PM',
                'tema' => 'Encuentro de articulación con invitados de sectores: Academia, Estado, Empresa y Sociedad',
            ],
            [
                'conferencista_id' => $decanos?->id,
                'lugar' => 'Auditorio Principal UCC',
                'enlaceVirtual' => 'https://meet.google.com/bienal-cierre-articulacion',
                'colaborador' => 'Comité Organizador VII Bienal Internacional',
                'tipoEvento' => 'CONFERENCIA',
                'programa' => 'Sistemas',
            ]
        );
    }
}
