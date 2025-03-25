<?php

namespace App\Services;

use App\Repositories\PersonRepository;

class PersonService extends BaseService
{
    protected      PersonRepository $repo;
    public function __construct(PersonRepository $personRepo)
    {
        $this->repo = $personRepo;
        parent::__construct($personRepo);
    }
    public function findPersonId($id)
    {
        return $this->repo->findRepoPersonId($id);
    }
    public function findPersonByAttributes(array $attributes)
    {        
        // Inicializar la consulta
        $query = $this->repo->findPersonByAttributes($attributes);       
        // Ejecutar la consulta y devolver los resultados
        return $query;
    }
}
