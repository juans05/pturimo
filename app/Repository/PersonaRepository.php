<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 10/08/2015
 * Time: 9:29
 */

namespace WSPturismo\Repository;


use WSPturismo\Entities\Persona;

class PersonaRepository  extends  BaseRepository
{

    /**
     * @return \WSPturismo\Entities\Entity;
     */
    public function  getModel()
    {
        return new Persona();
    }


    public function  registrarPersona($nombre,$apellido,$idUsuario){
         $this->getModel()->create([
            'apellido'=>$apellido,
            'celular'=>'',
            'nombre'=>$nombre,
            'fechanacimiento'=>'01/01/1989',
            'nroidentidad'=>'',
            'pais'=>'',
            'rol'=>'turista',
            'telefono'=>'',
            'tipoidentidad'=>'',
            'agencia_id'=>0,
            'attachment'=>0,
            'user_id'=>$idUsuario,
        ]);
        return true;
    }
}