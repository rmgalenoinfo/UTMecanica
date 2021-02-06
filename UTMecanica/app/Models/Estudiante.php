<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $guarded = [];

    //relacion uno a muchos (inversa)
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function estudianteTema() {
        return $this->hasMany(EstudianteTema::class,'estudiantes_id');
    }

}
