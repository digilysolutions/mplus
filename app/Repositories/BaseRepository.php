<?php

namespace App\Repositories;

use App\Repositories\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;





class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function all(array $colums = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($colums);
    }
    //Si is_activated es null devuelve todo, si es true solo los activos y false solos los inactivos
    function all_is_activated(array $colums = ['*'], array $relations = [], $is_activated = null) : Collection { 
        $query = $this->model->with($relations);
        if ($is_activated !== null) {
            $query->where('is_activated', $is_activated);
        }    
        return $query->get($colums);
     }

    public function allTrashed(): Collection
    {
        return $this->model->onlyTrashed()->get();
    }
    public function findByAttributes(
        array $attributes,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): Collection {
        // Inicia la consulta sobre el modelo
        $query = $this->model->select($columns);
    
        // Agrega las relaciones si es necesario
        if (!empty($relations)) {
            $query->with($relations);
        }
    
        // Agrega las condiciones para cada atributo
        foreach ($attributes as $key => $value) {
            $query->where($key, $value);
        }
    
        // Ejecuta la consulta
        $models = $query->get();
    
        // Si hay atributos para añadir (appends), se asignan a cada modelo
        if (!empty($appends)) {
            foreach ($models as $model) {
                $model->setAppends($appends);
            }
        }
    
        return $models;
    }
    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends  = []
    ): ?Model {
      
      // Utiliza find para obtener el modelo, seleccionando columnas y relaciones
     $model = $this->model->select($columns)->with($relations)->find($modelId);

    // Si hay atributos que añadir (appends), se asignan al modelo
    if (!empty($appends)) {
        $model->setAppends($appends);
    }

    return $model;
     //   return  $this->model->select($columns)->with($relations)->find($modelId)->$appends($appends);
    }

    public function findModelById(int $modelId): ?Model
    {
        $model = $this->model->find($modelId);
        return $model;
    }
    public function findTrashedById(int $modelId): ?Model
    {
        return $this->model->withTrashed()->find($modelId);
    }


    public function create(array $payload): ?Model
    {
        $model = $this->model->create($payload);
        return $model;
    }


    public function update(int $modelId, array $payload): ?Model
    {
        $model = $this->model->find($modelId);
        if ($model) {
            $model->update($payload);
            return $model;
        }
        return $model;
    }


    public function restoreById(int $modelId): bool
    {
        return  $this->findTrashedById($modelId)->restore();
    }

    public function deleteById(int $modelId): bool
    {
        $model = $this->model->find($modelId);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }
    public function deactivateModule(int $modelId): bool
    {
        $model = $this->model->find($modelId);
        if ($model) {
            $model->is_activated=false;
            $model->update();
            return true;
        }
        return false;
    }
    public function activateModule(int $modelId): bool
    {
        $model = $this->model->find($modelId);
        if ($model) {
            $model->is_activated=true;
            $model->update();
            return true;
        }
        return false;
    }

    public function permanentlyDeleteById(int $modelId): bool
    {
        return $this->findTrashedById($modelId)->forceDelete();
    }
}
