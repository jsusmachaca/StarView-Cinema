<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{

    protected $table = 'MOVIES';
    protected $primaryKey = 'id';

    protected $fillable = ['titulo', 'info', 'duracion', 'precio', 'banner', 'taquilla', 'id'];

    public $timestamps = false;
}
