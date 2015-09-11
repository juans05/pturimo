<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 09/08/2015
 * Time: 18:09
 */

namespace WSPturismo\Repository;


abstract class BaseRepository
{
    /**
     * @return \WSPturismo\Entities\Entity;
     */
   abstract  public function  getModel();


    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function  newQuery(){
        return $this->getModel()->newQuery();
    }

   public function  findOrFall($id){
       return $this->newQuery()->findOrFall($id);
   }

    public function  getAllModel(){

        return $this->getModel()->all();
    }

    public function datosRelacionados($tabla){

        return $this->getModel()->with([$tabla]);
    }


}