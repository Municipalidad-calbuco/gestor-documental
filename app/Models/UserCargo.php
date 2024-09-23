<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCargo extends Model
{
    use HasFactory;
    protected $fillable = ['id_usuario', 'id_cargo'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'id_cargo');
    }
}
