<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Inscripcion;

class NotificacionInscripcion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inscripcion)
    {
        $this->inscripcion = Inscripcion::join('eventos', 'inscripcions.evento_id', 'eventos.id')
                                        ->where('inscripcions.id', $inscripcion->id)
                                        ->select('inscripcions.nombre', 'eventos.*')
                                        ->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@gmail.com', 'Semana Internacional de la Ingeniería UCC')
                    ->subject('Inscripción a evento Semana Internacional de la Ingeniería UCC')
                    ->view('email.inscripcion', ['inscripcion' => $this->inscripcion]);
        // return $this->view('view.name');
    }
}
