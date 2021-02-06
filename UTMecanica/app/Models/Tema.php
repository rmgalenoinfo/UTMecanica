<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function docente(){
        return $this->belongsTo(Docente::class,);
    }

    public function tipo(){
        return $this->belongsTo(Tipo::class,);
    }

    public function estudianteTema() {
        return $this->hasMany(EstudianteTema::class,'temas_id');
    }
}
