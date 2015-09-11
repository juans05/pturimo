<?php

namespace WSPturismo\Entities;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Entity
{

    protected $table = 'paquete';
    public function  reserva(){
        return $this->belongsToMany(User::getClass(),'reserva');
    }

    public function  agencia(){
        return $this->belongsTo(Agencia::getClass(),'agencia_id');
    }
}
