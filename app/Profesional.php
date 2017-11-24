<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profesional extends Authenticatable
{
    use Notifiable;
    protected $table = "profesionales";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'run', 'dv', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function profesion(){
        return $this->belongsTo(Profesion::class);
    }
    public function sexo(){
        return $this->belongsTo(Sexo::class);
    }
    public function eventos() {
        return $this->hasMany(AtencionEvento::class);
    }
}
