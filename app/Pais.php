<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "paises";

    protected $fillable =['iso','nombre'];

    public function usuarios() {
        return $this->hasMany(Usuario::class);
    }
}
