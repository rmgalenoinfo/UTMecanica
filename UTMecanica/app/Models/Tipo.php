<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tema() {
        return $this->hasMany(Tema::class,'tipos_id');
    }
}
