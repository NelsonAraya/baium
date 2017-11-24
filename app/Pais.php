<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "paises";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =['iso','nombre'];

    public function usuarios() {
        return $this->hasMany(Usuario::class);
    }
}
