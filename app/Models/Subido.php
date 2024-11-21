<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subido extends Model
{
    protected $table = "subidos";
    
    protected $fillable = ['originalName', 'path'];
}
