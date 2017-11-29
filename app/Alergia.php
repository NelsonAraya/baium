<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    protected $table = "alergias";

    protected $fillable =['nombre'];

    public function usuarios(){
        return $this->belongsToMany(Usuario::class)->withTimestamps();
    }
}
