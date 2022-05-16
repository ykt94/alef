<?php
namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


/**
* Interface EloquentRepositoryContract
* @package App\Repositories
*/
interface EloquentRepositoryContract
{
   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;

   public function all(): Collection;
}