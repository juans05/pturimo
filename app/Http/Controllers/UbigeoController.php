<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 21/08/2015
 * Time: 0:32
 */

namespace WSPturismo\Http\Controllers;


use WSPturismo\Repository\UbigeoRepository;

class UbigeoController extends Controller
{
    private $UbigeoRepository;

    public function  __construct(UbigeoRepository $ubigeoRepository){


        $this->UbigeoRepository = $ubigeoRepository;
    }



    public function index(){
         return $this->UbigeoRepository->departamento();
     }
    public function show($iddepartamento){
        return   $this->UbigeoRepository->Provincia($iddepartamento);
    }
    public function provincia($idprovincia){
        return   $this->UbigeoRepository->distrito($idprovincia);
    }
}