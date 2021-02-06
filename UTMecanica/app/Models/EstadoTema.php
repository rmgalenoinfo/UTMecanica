<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoTema extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function estudianteTema() {
        return $this->hasMany(EstudianteTema::class,'estado_tema_id');
    }

}
