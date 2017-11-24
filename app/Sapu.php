<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sapu extends Model
{
    protected $table = "sapus";

    protected $fillable =['nombre'];

    public function atenciones() {
        return $this->hasMany(Atencion::class);
    }
}
