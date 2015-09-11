<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 21/08/2015
 * Time: 0:35
 */

namespace WSPturismo\Repository;


use WSPturismo\Entities\Ubigeo;

class UbigeoRepository extends  BaseRepository
{

    /**
     * @return \WSPturismo\Entities\Entity;
     */
    public function  getModel()
    {
        return new Ubigeo();
    }

    public function  departamento(){

     return    $dato= $this->newQuery()->where('tipo','=','DEPARTAMENTO')->get(['id','nombre','codigo','idrel']);
    }
    public function  Provincia($idDepartamento){
        return    $dato= $this->newQuery()->where('tipo','=','PROVINCIA')->where('idrel','like',$idDepartamento)->get(['id','nombre','codigo']);
    }
    public function  distrito($idProvincia){
        return    $dato= $this->newQuery()->where('tipo','=','DISTRITO')->where('idrel','=',$idProvincia)->get(['id','nombre','codigo']);
    }
}