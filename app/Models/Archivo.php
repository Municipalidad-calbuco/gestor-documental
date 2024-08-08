<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_archivo',
        'id_google_drive',
        'tipo_archivo',
        'id_oficina',
        'id_info',
        'id_proceso'
 
    ];


    public function archivo()
    {
        return $this->belongsTo(Proceso::class, 'id_proceso');
    }
}
