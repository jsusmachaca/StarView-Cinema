<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable = [
        'id',
        'nombre',
        'pelicula',
        'cantidad_boletos',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nombre', 'name');
    }


}
