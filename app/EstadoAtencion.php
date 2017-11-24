<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoAtencion extends Model
{
    protected $table = "estados_atenciones";
    protected $fillable =['cod','nombre'];

    public function atenciones() {
        return $this->hasMany(Atencion::class);
    }
}
