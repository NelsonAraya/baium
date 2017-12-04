<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "usuarios";

    protected $fillable =['run_acompanante','dni','nombres','apellidop','apellidom','fecha_nacimiento',
        'telefono','prevision_id','sexo_id','pais_id','direccion'];

    public function runCompleto(){
        return $this->run.'-'.$this->dv;
    }
    public function nombreCompleto(){
        return $this->nombres.' '.$this->apellidop.' '.$this->apellidom;
    }

    public function prevision(){
        return $this->belongsTo(Prevision::class);
    }
    public function sexo(){
        return $this->belongsTo(Sexo::class);
    }
    public function pais(){
        return $this->belongsTo(Pais::class);
    }
    public function cronicos(){
        return $this->belongsToMany(Cronico::class)->withTimestamps();
    }
    public function atenciones() {
        return $this->hasMany(Atencion::class);
    }
    public function alergias(){
        return $this->belongsToMany(Alergia::class)->withTimestamps();
    }


}
