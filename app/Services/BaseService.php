<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Services\Contracts\ServiceInterface;

class BaseService implements ServiceInterface
{
    protected   $repository;
    public function __construct($repo)
    {
        $this->repository = $repo;
    }
    public function all(array $colums = ['*'], array $relations = []): Collection
    {
        return $this->repository->all($colums, $relations);
    }
    public function all_is_activated($is_activated = null): Collection
    {

        if ($is_activated === true || $is_activated === false || $is_activated === null) {
            // Si is_activated es null, entonces obtenemos todas las localizaciones
            //Si es true todos los que estan activos
            //Si es false todos los inactivos
            $data =  $this->repository->all_is_activated(['*'], [], $is_activated);
            return $data;
        }
        return response()->json(['message' => 'Error 404 - Página no encontrada']);
    }
    public function allTrashed(): Collection
    {
        return $this->repository->allTrashed();
    }
    public function findById(
        int $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends  = []
    ): ?Model {

        return  $this->repository->findById($modelId, $columns, $relations, $appends);
    }
    public function findTrashedById(int $modelId): ?Model
    {
        return $this->repository->findTrashedById($modelId);
    }
    public function create(array $payload): ?Model
    {
        return $this->repository->create($payload);
    }
    public function update(int $modelId, array $payload): ?Model
    {
        return $this->repository->update($modelId, $payload);
    }
    public function restoreById(int $modelId): bool
    {
        return $this->repository->restoreById($modelId);
    }
    public function deleteById(int $modelId): bool
    {
        return $this->repository->deleteById($modelId);
    }
    public function permanentlyDeleteById(int $modelId): bool
    {
        return $this->repository->permanentlyDeleteById($modelId);
    }
    public function activateModule(int $modelId): bool
    {
        return $this->repository->activateModule($modelId);
    }
    public function deactivateModule(int $modelId): bool
    {
        return $this->repository->deactivateModule($modelId);
    }

    public function findByAttributes($attributes)
    {
        return $this->repository->findByAttributes($attributes);
    }
}
