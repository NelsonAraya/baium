<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cronico extends Model
{
    protected $table = "cronicos";

    protected $fillable =['nombre'];

    public function usuarios(){
        return $this->belongsToMany(Usuario::class)->withTimestamps();
    }
}
