<?php

namespace WSPturismo\Repository;
use WSPturismo\Entities\Agencia;
use WSPturismo\Entities\Paquete;
use WSPturismo\Entities\Ubigeo;

/**
 * Created by PhpStorm.
 * User: juan
 * Date: 09/08/2015
 * Time: 14:40
 */
class AgenciaRepository extends  BaseRepository
{


    /**
     * @return \WSPturismo\Entities\Entity;
     */
    public function  getModel()
    {
       return new Agencia();
    }

    public function mostrarTodaAgencia(){

        $result=\DB::table('agencia')
            ->select(['agencia.id','agencia.web','agencia.rsocial','agencia.email','agencia.direccion','agencia.telefono','agencia.attachment'])
            ->where('estado','=','enabled')
            ->paginate(15);
        return $result;

    }
    public function  mostrarDatosAgencia($id){
        return Agencia::with(['Ubigeo','paquete'])->where('id','=',$id)->get(['id',
            'cantpublicacion',
            'direccion',
            'email',
            'estado',
            'latlng',
            'ncomercial',
            'telefono',
            'web',
            'ubigeo_id','attachment']);
    }
    public function buscarPorubigeo($idUbigeo){
        return Agencia::with(['Ubigeo','paquete'])->where('ubigeo_id','=',$idUbigeo)->get(['id',
            'cantpublicacion',
            'direccion',
            'email',
            'estado',
            'latlng',
            'ncomercial',
            'telefono',
            'web',
            'ubigeo_id','attachment']);
    }
    public function buscarporRating(){

    }
}