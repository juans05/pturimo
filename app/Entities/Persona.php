<?php

namespace WSPturismo\Entities;

use Illuminate\Database\Eloquent\Model;

class Persona extends Entity
{
    protected $table = 'persona';

    protected $fillable = ['apellido', 'celular', 'fechanacimiento','nombre','nroidentidad','pais','rol','telefono','tipoidentidad','agencia_id','attachment_id','user_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['apellido', 'celular', 'fechanacimiento','nombre','nroidentidad','pais','rol','telefono','tipoidentidad','agencia_id','attachment_id','user_id'];


    public function user(){

        return $this->belongsTo(User::getClass());


    }

    public function empresa(){
        return $this->belongsTo(Agencia::getClass());
    }



}
