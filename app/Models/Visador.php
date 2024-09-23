<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visador extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_usuario',
        'id_archivo',
        'observacion',
        'estado',
        'fecha_visacion'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function archivo()
    {
        return $this->belongsTo(Archivo::class, 'id_archivo');
    }
}
