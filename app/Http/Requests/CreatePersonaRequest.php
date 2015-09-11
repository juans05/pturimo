<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 10/08/2015
 * Time: 23:37
 */

namespace WSPturismo\Http\Requests;

use WSPturismo\Http\Requests\Request;

class CreatePersonaRequest extends  Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_persona'=>'required',
            'email'=>'unique:usuario,email',
            'tipdoc'=>'required',
            'dni'=>'required|min:5|max:11|unique:persona,nroidentidad',
            'ticket'=>'required|unique:ticket,nroticket',
        ];
    }
}