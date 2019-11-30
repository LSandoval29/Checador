<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'fechaInicio', 'fechaCierre', 'status'];
}
