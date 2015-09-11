<?php

namespace WSPturismo\Entities;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Entity
{
    protected $table = 'comentario';
    public function user(){
        return $this->hasMany(User::getClass());
    }
}
