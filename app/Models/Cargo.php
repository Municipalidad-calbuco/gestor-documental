<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_cargos', 'id_cargo', 'id_usuario');
    }
}
