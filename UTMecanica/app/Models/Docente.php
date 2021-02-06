<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relacion uno a muchos (inversa)
    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function tema() {
        return $this->hasMany(Tema::class,'docentes_id');
    }

    public function estudianteTema() {
        return $this->hasMany(EstudianteTema::class,'docentes_id');
    }

}
