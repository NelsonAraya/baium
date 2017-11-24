<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtencionEvento extends Model
{
    protected $table = "atenciones_eventos";
    protected $fillable =['profesional_id','atencion_id','evento'];

    public function atencion() {
        return $this->belongsTo(Atencion::class);
    }
    public function profesional() {
        return $this->belongsTo(Profesional::class);
    }
}
