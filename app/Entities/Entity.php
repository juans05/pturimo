<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 09/08/2015
 * Time: 15:23
 */

namespace WSPturismo\Entities;
use Illuminate\Database\Eloquent\Model;

class Entity extends  Model
{
    public static function getClass(){
        return get_class(new static);
    }

}