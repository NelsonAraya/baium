<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    protected $table = "atenciones";

    protected $fillable =['usuario_id','motivo','estado_id','num_boleta','valor_boleta','nota_boleta',
        'arterial','pulso','saturacion','axilar','rectal','resp','peso','talla','eva','hgt','glasgow','categoria'];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    public function estado(){
        return $this->belongsTo(EstadoAtencion::class);
    }
    public function sapu(){
        return $this->belongsTo(Sapu::class);
    }
    public function eventos() {
        return $this->hasMany(AtencionEvento::class);
    }
}
