<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class SubMenuRol extends Model
{
    use HasFactory;
    protected $table = 'sub_menus_roles';
    protected $guarded = [];
}
