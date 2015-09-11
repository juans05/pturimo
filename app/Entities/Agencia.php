<?php

namespace WSPturismo\Entities;



class Agencia extends Entity
{
    protected $table = 'agencia';
    public function personas(){

        return $this->hasMany(Persona::getClass());

    }
    public function ubigeo(){
        return $this->belongsTo(Ubigeo::getClass());
    }

    public function paquete(){

        return $this->hasMany(Paquete::getClass(),'agencia_id');
    }
}
