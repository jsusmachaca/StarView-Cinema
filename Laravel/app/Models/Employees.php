<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    // use HasFactory;
    protected $table = 'EMPLEADOS';
    protected $primaryKey = 'id_emp'; // Cambia 'id' por la clave primaria de tu tabla si es diferente

    protected $fillable = ['nombres', 'apelllidos', 'id_emp', 'dni', 'sueldo', 'horas_trabajo', 'telefono'];

    public $timestamps = false;
}
