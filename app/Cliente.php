<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['idParqueadero','nombre','apellido','telefono','nrodocumento'];
}
