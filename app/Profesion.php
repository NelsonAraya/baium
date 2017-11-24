<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
    protected $table = "profesiones";

    public function profesionales() {
        return $this->hasMany(Profesional::class);
    }
}
