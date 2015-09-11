<?php

namespace WSPturismo\Http\Controllers;

use Illuminate\Http\Request;

use WSPturismo\Entities\User;
use WSPturismo\Http\Requests;
use WSPturismo\Http\Controllers\Controller;
use WSPturismo\Repository\UsuarioRepository;
use WSPturismo\Http\Requests\CreatePersonaRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    private $usuarioRepository;


    public function  __construct(UsuarioRepository $UsuarioRepository){
        $this->usuarioRepository=$UsuarioRepository;


    }
    public function index()
    {
         $usuariio=$this->usuarioRepository->getAllUsuario();
        return response()->json($usuariio);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)    {
        $usuario=$this->usuarioRepository->registrarNuevoUsuario($request->all());
        if($usuario>0){
            if($this->usuarioRepository->registrarPersona($request->input('nombre'),$request->input('apellido'),$usuario)){
                return $usuario->id;
            }else{
                return 0;
            }
        }else{
            return "Usuario Existente";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $datos=$this->usuarioRepository->consultaInformacionUsuario($id);
        return response()->json($datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $datos=$this->usuarioRepository->consultaInformacionUsuario($id);
        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {

        return response()->json($this->usuarioRepository->actualizarPersona($request->all()));

      //  return response()->json($request->input('celular'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


    public function  verificacionDesesion(Request $request){

        $datos=$this->usuarioRepository->VerificacionDatos($request->input('usuario'),$request->input('clave'));
        return $datos;
    }


}
