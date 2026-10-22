<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conferencista extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Obtener la URL de la foto o la imagen genérica por defecto.
     *
     * @return string
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto && file_exists(public_path('storage/' . $this->foto))) {
            return asset('storage/' . $this->foto);
        }

        return asset('storage/uploads/default.png');
    }
}
