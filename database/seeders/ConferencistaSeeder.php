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
        // 1. Dra. Patricia Martínez Moreno
        Conferencista::updateOrCreate(
            ['nombre' => 'Dra. Patricia Martínez Moreno'],
            [
                'pais' => 'mx',
                'correo' => 'pmartinez@uv.mx',
                'cv' => 'Profesora de tiempo completo en la Facultad de Contaduría y Administración de Coatzacoalcos, Universidad Veracruzana (México), adscrita al programa de Ingeniería de Software. Cuenta con reconocimiento de Perfil Deseable PRODEP, es candidata en el Sistema Nacional de Investigadoras e Investigadores de México (SNII) e integra el Cuerpo Académico "Aplicación y Enseñanza de la Ingeniería de Software". Participa activamente en la Cátedra Mujeres en la Ciencia y la Tecnología. Especialista en ingeniería de software, accesibilidad web bajo lineamientos WCAG y analítica de datos.',
                'foto' => 'uploads/default.png',
            ]
        );

        // 2. Dr. Fernando Tinetti
        Conferencista::updateOrCreate(
            ['nombre' => 'Dr. Fernando Tinetti'],
            [
                'pais' => 'ar',
                'correo' => 'fernando.tinetti@info.unlp.edu.ar',
                'cv' => 'Profesor titular de la Facultad de Informática de la Universidad Nacional de La Plata (UNLP), Argentina, desde 1998, y asesor de programas de investigación de la Comisión de Investigaciones Científicas de la Provincia de Buenos Aires. Doctor en Ciencias de la Computación por la Universidad Autónoma de Barcelona (2004), Magíster en Ciencias de la Computación (1997), Analista de Sistemas (1990) y Licenciado en Ciencias de la Computación (1992) en la UNLP. Especialista en computación de alto desempeño (HPC), computación paralela y distribuida, clústeres, Internet de las cosas (IoT), robótica y procesamiento en tiempo real. Autor o coautor de más de 20 libros y más de 200 trabajos de investigación publicados internacionalmente.',
                'foto' => 'uploads/default.png',
            ]
        );

        // 3. Dr. José Antonio Vergara
        Conferencista::updateOrCreate(
            ['nombre' => 'Dr. José Antonio Vergara'],
            [
                'pais' => 'mx',
                'correo' => 'jvergara@uv.mx',
                'cv' => 'Académico de tiempo completo de la Universidad Veracruzana (México) con más de 30 años de experiencia profesional y docente. Doctor en Educación y Magíster en Ingeniería de Software y Tecnología Educativa. Amplia trayectoria en desarrollo de software, redes de computadores, accesibilidad web y gestión académica institucional. Ha ejercido como director de facultad, miembro de instancias estratégicas de TI y coordinador de comisiones académicas. Candidato en el Sistema Nacional de Investigadoras e Investigadores de México y reconocimiento de Perfil Deseable PRODEP.',
                'foto' => 'uploads/default.png',
            ]
        );

        // 4. Ing. Ricardo Naranjo Faccini
        Conferencista::updateOrCreate(
            ['nombre' => 'Ing. Ricardo Naranjo Faccini'],
            [
                'pais' => 'co',
                'correo' => 'rnaranjo@javeriana.edu.co',
                'cv' => 'Ingeniero de Sistemas, empresario y profesor de cátedra en la Pontificia Universidad Javeriana. Amplia experiencia en tecnologías de información y comunicaciones, desarrollo de software seguro, seguridad de la información, estándares de comunicación e integración de software libre en organizaciones. Se desempeña como Gerente General de Skina IT Solutions y representa a Colombia en el Comité de Ciberseguridad de la Unión Panamericana de Asociaciones de Ingenieros (UPADI).',
                'foto' => 'uploads/default.png',
            ]
        );

        // 5. Ing. Alfredo Antonio Díaz Claros
        Conferencista::updateOrCreate(
            ['nombre' => 'Ing. Alfredo Antonio Díaz Claros'],
            [
                'pais' => 'co',
                'correo' => 'alfredo.diaz@bienal.ucc.edu.co',
                'cv' => 'Profesional con más de 15 años de experiencia con formación en el Instituto Tecnológico y de Estudios Superiores de Monterrey (ITESM) y la Universidad Autónoma de Bucaramanga. Cuenta con certificaciones internacionales en Big Data, Inteligencia Artificial, ITIL y auditoría interna ISO 27001, así como formación avanzada en arquitectura empresarial, business intelligence, analítica de datos y seguridad. Especialista en gobernanza operativa de IA (ISO/IEC 42001), orquestación de agentes inteligentes con n8n y ciclo de vida integral MLOps con MLflow.',
                'foto' => 'uploads/default.png',
            ]
        );

        // 6. Panel de Decanos de Ingeniería
        Conferencista::updateOrCreate(
            ['nombre' => 'Panel de Decanos de Ingeniería'],
            [
                'pais' => 'co',
                'correo' => 'decanos.ingenieria@bienal.ucc.edu.co',
                'cv' => 'Panel directivo y académico conformado por líderes de facultades de ingeniería: Ing. Edgar A. López, Ing. Oscar Walteros, Ing. Diego Mendoza, Dra. Dora P. Montaña e Ing. Oscar J. Briñez. Espacio dedicado a debatir el futuro de la formación en ingeniería, articulación con el sector productivo y gubernamental, y los desafíos éticos y de gobernanza ante la adopción de tecnologías emergentes.',
                'foto' => 'uploads/default.png',
            ]
        );

        // 7. Comunidad GensTI y Semilleros
        Conferencista::updateOrCreate(
            ['nombre' => 'Comunidad GensTI - Estudiantes e Investigadores'],
            [
                'pais' => 'co',
                'correo' => 'gensti@campusucc.edu.co',
                'cv' => 'Comunidad académica y de innovación de la Universidad Cooperativa de Colombia integrada por semilleristas, docentes investigadores y estudiantes destacados de los cursos formativos de Ingeniería de Sistemas. Presentación de proyectos aplicados, pósteres de investigación formativa y soluciones tecnológicas orientadas a los retos de la región del Tolima.',
                'foto' => 'uploads/default.png',
            ]
        );
    }
}
