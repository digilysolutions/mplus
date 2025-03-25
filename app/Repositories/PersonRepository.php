<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class PersonRepository extends BaseRepository
{
    public function __construct(Person $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [

        'id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'marital_status',
        'blood_group',
        'language',
        'is_activated'

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Person::class;
    }
    public function  findRepoPersonId($id)
    {
        return  Person::with('owner', 'employee', 'customer', 'contact')->findOrFail($id);
    }

    public function findPersonByAttributes(array $attributes)
    {
        // Inicia la consulta sobre el modelo
        $query = $this->model::with('contact');

        // Construir la consulta dinámica con condiciones OR
        $query->where(function ($q) use ($attributes) {
            foreach ($attributes as $key => $value) {
                if (!$value) {
                    continue; // Salta valores vacíos
                }
                // Verifica si la columna corresponde a 'people' o 'contacts'
                if (in_array($key, $this->getPeopleColumns())) {
                    $q->orWhere($key, $value);
                } elseif (in_array($key, $this->getContactColumns())) {
                    $q->orWhereHas('contact', function ($query) use ($key, $value) {
                        $query->where($key, $value);
                    });
                }
            }
        });
        // Ejecutar la consulta y devolver los resultados
        return $query->get();
    }

    /* public function findPersonByAttributes(array $attributes)
    {
        // Inicia la consulta sobre el modelo
        $query = $this->model::with('contact');

        // Array para almacenar las condiciones de búsqueda
        $conditions = [];

        // Recorrer los atributos y construir las condiciones
        foreach ($attributes as $key => $value) {
            if (!$value) {
                continue; // Salta valores vacíos
            }

            // Verifica si la columna corresponde a 'people'
            if (in_array($key, $this->getPeopleColumns())) {
                $conditions[] = [$key, $value];
            }
            // Verifica si la columna corresponde a 'contacts'
            elseif (in_array($key, $this->getContactColumns())) {
                $conditions[] = function ($query) use ($key, $value) {
                    $query->where($key, $value);
                };
            }
        }

        // Agregar condiciones al query si existen
        if (!empty($conditions)) {
            $query->where(function ($q) use ($conditions) {
                foreach ($conditions as $condition) {
                    if (is_callable($condition)) {
                        $q->orWhereHas('contact', $condition);
                    } else {
                        $q->orWhere($condition[0], $condition[1]);
                    }
                }
            });
        }

        // Ejecutar la consulta y devolver los resultados
        return $query->get();
    }*/
    protected function getPeopleColumns(): array
    {
        return [
            'first_name',
            'middle_name',
            'last_name',
            'gender',
            'marital_status',
            'blood_group',
            'language',
            'person_statuses_id',
            'contact_id',
            'is_activated'
        ]; // añade todas las columnas que existen en 'people'
    }

    /**
     * Devuelve las columnas para la tabla 'contacts'.
     */
    protected function getContactColumns(): array
    {
        return ['email', 'family_number', 'alternate_number', 'mobile', 'phone', 'location_id']; // añade todas las columnas que existen en 'contacts'
    }
}
