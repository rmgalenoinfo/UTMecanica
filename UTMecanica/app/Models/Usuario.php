<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $guarded = [];

    //relacion uno a muchos (inversa)
    public function roles(){
        return $this->belongsTo(Rol::class);
    }
}
