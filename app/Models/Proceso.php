<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'id_usuario',
        'id_tipo_doc'
    ];
}
