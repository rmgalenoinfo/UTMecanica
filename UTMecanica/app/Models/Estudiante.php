<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
