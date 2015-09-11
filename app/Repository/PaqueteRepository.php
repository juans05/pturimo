<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 11/08/2015
 * Time: 9:23
 */

namespace WSPturismo\Repository;


use WSPturismo\Entities\Paquete;

class PaqueteRepository extends BaseRepository
{

    /**
     * @return \WSPturismo\Entities\Entity;
     */
    public function  getModel()
    {
       return new Paquete();
    }

    public function  paqueteTotales(){
         return     $result=\DB::table('paquete')
            ->select('paquete.nombrepaquete','paquete.preciototal','paquete.nrodias','paquete.nronoches','paquete.nroidentidad')
            ->where('paquete.publicado',1)
            ->where('paquete.estado','enabled')
            ->join('agencia','paquete.id','=','agencia.user_id')
            ->paginate(15);
    }
    public function  paqueteDetalle($idPaquete){

    }

    public function  ActividadPaquete($idActividad){
        return  $result=\DB::table('actividad')
            ->select('paquete.nombrepaquete','paquete.preciototal','paquete.nrodias','paquete.nronoches','paquete.nroidentidad')
            ->where('paquete.publicado',1)
            ->where('paquete.estado','enabled')
            ->where('actividadpaquete.id',$idActividad)
            ->join('actividadpaquete','activdad.id','=','actividadpaquete.idactividad')
            ->join('paquete','actividadpaquete.idpaquete','=','paquete.id')
            ->paginate(15);
    }


    public function paqueteLugaresTuristicos($idcategoria){
        return  $result=\DB::table('categoria')
            ->select('paquete.nombrepaquete','paquete.preciototal','paquete.nrodias','paquete.nronoches','paquete.nroidentidad')
            ->where('paquete.publicado',1)
            ->where('paquete.estado','enabled')
            ->where('categoria.id',$idcategoria)
            ->join('categoriapaquete','categoria.id','=','categoriapaquete.idcategoria')
            ->join('paquete','categoriapaquete.idpaquete','=','paquete.id')
            ->paginate(15);
    }
    public function paqueteActractivoTuristico($idatractivoTuristico){
        return  $result=\DB::table('atractivoturistico')
            ->select('paquete.nombrepaquete','paquete.preciototal','paquete.nrodias','paquete.nronoches','paquete.nroidentidad')
            ->where('paquete.publicado',1)
            ->where('paquete.estado','enabled')
            ->where('atractivoturistico.id',$idatractivoTuristico)
            ->join('paquetelugar','atractivoturistico.id','=','paquetelugar.idatractivoturistico')
            ->join('paquete','paquetelugar.idpaquete','=','paquete.id')
            ->paginate(15);
    }
    public function  paqueteReserva($idusuario){
        return  $result=\DB::table('usuario')
            ->select('paquete.nombrepaquete','paquete.preciototal','paquete.nrodias','paquete.nronoches','paquete.nroidentidad','reserva.estado','reserva.codigoreserva')
            ->where('paquete.publicado',1)
            ->where('paquete.estado','enabled')
            ->where('usuario.id',$idusuario)
            ->join('reserva','usuario.id','=','reserva.idusuario')
            ->join('paquete','reserva.idpaquete','=','paquete.id')
            ->paginate(15);
    }

    

}