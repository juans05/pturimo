<?php

namespace WSPturismo\Entities;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Entity
{
    protected $table = 'ubigeo';

    public function  agencia(){
        return $this->hasOne(Agencia::getClass());
    }
}
