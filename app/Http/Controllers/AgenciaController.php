<?php

namespace WSPturismo\Http\Controllers;

use Illuminate\Http\Request;

use WSPturismo\Http\Requests;
use WSPturismo\Http\Controllers\Controller;
use WSPturismo\Repository\AgenciaRepository;

class AgenciaController extends Controller
{

    private $agenciaRepository;

    public function  __construct(AgenciaRepository $agenciaRepository){


        $this->agenciaRepository = $agenciaRepository;
    }

    public function index()
    {
         return $this->agenciaRepository->mostrarTodaAgencia();
    }

    public function show($id)
    {
        return $this->agenciaRepository->mostrarDatosAgencia($id);
    }

    public function buscarxUbigeo($idubigeo){
        return $this->agenciaRepository->buscarPorubigeo($idubigeo);
    }

    public function buscarxRating($Rating){
        return $this->agenciaRepository->buscarporRating($Rating);
    }
}
