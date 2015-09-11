<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 09/08/2015
 * Time: 17:32
 */

namespace WSPturismo\Repository;


use WSPturismo\Entities\Persona;
use WSPturismo\Entities\User;


class UsuarioRepository extends  BaseRepository
{
    public function  comentariosLastest(){

        $datos="Persona";
        return $this->datosRelacionados($datos);
    }

    public function  getModel()
    {
        return new Persona();
    }


    public function  getModelRelacion()
    {

      return  new Persona();

    }

    public function getAllUsuario(){

        return $this->getAllModel();
    }
    public static function  VerificacionDatos($user,$clave){

        $result=\DB::table('usuario')
            ->select('usuario.email','persona.id','persona.nombre','persona.apellido','persona.nroidentidad')
            ->where('usuario.email',$user)
            ->where('usuario.password',$clave)
            ->join('persona','usuario.id','=','persona.user_id')
            ->get();

        if(count($result)>0){
            return $result;
        }else{
            return "NO hay información";
        }

    }
    public function  registrarNuevoUsuario(array $data){

        $dato= $this->newQuery()->where('email','=',$data['email'])->get()->count();
        if($dato==0){
            $usuario= User::create([
                'email' => $data['email'],
                'estado' => 'Enable',
                'password' => bcrypt('secret'),
            ]);
            return $usuario->id;
        }else{

            return 0;
        }


    }


    public function  registrarPersona($nombre,$apellido,$idUsuario){
        $persona=  Persona::create([
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

    public function  consultaInformacionUsuario($id){

        $datoUsuario=\DB::table('persona')
            ->select('persona.id','persona.nombre','persona.apellido','persona.nroidentidad','persona.user_id')
            ->where('persona.user_id',$id)
            ->get();

        return $datoUsuario;
    }

    public function  actualizarPersona(array $data){
        $this->getModel()->newQuery()->where('id', '=', $data['id'])
                       ->update(array(
                               'celular' => $data['celular'],
                               'fechanacimiento'=>$data['fechanacimiento'],
                               'nroidentidad'=>$data['nroidentidad'],
                               'pais'=>$data['pais'],
                               'telefono'=>$data['telefono'],
                                'tipoidentidad'=>$data['tipoidentidad'],
                               'attachment'=>$data['attachment']));

        return true;
    }
}