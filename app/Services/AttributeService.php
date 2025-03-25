<?php

namespace App\Services;

use App\Models\Attributes;
use App\Repositories\AttributeRepository;

class AttributeService extends BaseService
{

    public function __construct(AttributeRepository $attributeRepo)
    {
        parent::__construct($attributeRepo);
    }
    public function createAttributeWithTerms(array $data)
    {
        // Crear el atributo
        $attribute = $this->create($data);
        // Si hay términos, crear los términos relacionados al atributo
        if (isset($data['terms']) && is_array($data['terms'])) {
            foreach ($data['terms'] as $termData) {
                $attribute->terms()->create(['name' => $termData['name']]);
            }
        }
        return $attribute;
    }

    public function updateAttributeWithTerms(Attributes $attribute, array $data)
    {
      
        // Actualizar el atributo
        $this->update($attribute->id, $data);
       
        // Actualizar los términos
        if (isset($data['terms']) && is_array($data['terms'])) {
            // Destruir los términos previos            
            $attribute->terms()->delete();           
            // Agregar los nuevos términos
           
            foreach ($data['terms'] as $termData) {             
                $attribute->terms()->create(['name' => $termData['name']]);
            }
        }
        return $attribute;
    }
}
