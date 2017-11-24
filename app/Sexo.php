<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = "sexos";

    public function usuarios() {
        return $this->hasMany(Usuario::class);
    }
    public function profesionales() {
        return $this->hasMany(Profesional::class);
    }
}
