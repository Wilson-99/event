<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

    abstract class AbstractRepository{
        public function __construct(Model $model)
        {
            $this->model = $model;
        }

        public function getResult(){
            return $this->model->get();
        }

        public function getResultPage($pageRegisted){
            return $this->model->paginate($pageRegisted);
        }
    }

?>
