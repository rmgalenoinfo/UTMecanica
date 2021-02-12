<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteTema extends Model
{
    use HasFactory;
    protected $table = 'estudiantes_temas';
    protected $guarded = [];

    //relacion uno a muchos (inversa)
    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }

    //relacion uno a muchos (inversa)
    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    //relacion uno a muchos (inversa)
    public function tema(){
        return $this->belongsTo(Tema::class);
    }

    //relacion uno a muchos (inversa)
    public function estadoTema(){
        return $this->belongsTo(EstadoTema::class);
    }
}
