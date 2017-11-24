<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prevision extends Model
{
    protected $table = "previsiones";

    public function usuarios() {
        return $this->hasMany(Usuario::class);
    }
}
