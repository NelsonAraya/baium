<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = "sexos";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod','nombre',
    ];

    public function usuarios() {
        return $this->hasMany(Usuario::class);
    }
    public function profesionales() {
        return $this->hasMany(Profesional::class);
    }
}
