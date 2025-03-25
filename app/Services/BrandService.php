<?php

namespace App\Services;

use App\Models\Brand;
use App\Repositories\AttributeRepository;
use App\Repositories\BrandRepository;

class BrandService extends BaseService
{

    protected      BrandRepository $repo;
    public function __construct(BrandRepository $brandRepo)
    {
        $this->repo = $brandRepo;
        parent::__construct($brandRepo);
    }


    public function findAllBrandsWithProducts()
    {
        return $this->repo->findAllBrandsWithProducts();
    }
    public function createBrandWithModel(array $data)
    {
        // Crear la marca
        $brand = $this->create($data);

        // Si hay modelos, crear los modelos  relacionados a la marca
        if (isset($data['models']) && is_array($data['models'])) {
            foreach ($data['models'] as $modelData) {
                $brand->models()->create(
                    [
                        'name' => $modelData['name'],
                        'description' => $modelData['description'],
                        'year' => $modelData['year'],
                        'characteristics' => $modelData['characteristics']
                    ]
                );
            }
        }
        return $brand;
    }
    public function updateBrandWithModel(Brand $brand, array $data)
    {
        // Actualizar la marca
        $this->update($brand->id, $data);

        // Actualizar los modelos
        if (isset($data['models']) && is_array($data['models'])) {
            // Destruir los modelos previos            
            $brand->terms()->delete();
            // Agregar los nuevos modelos
            foreach ($data['models'] as $modelData) {
                $brand->terms()->create(
                    [
                        'name' => $modelData['name'],
                        'description' => $modelData['description'],
                        'year' => $modelData['year'],
                        'characteristics' => $modelData['characteristics']
                    ]
                );
            }
        }
        return $brand;
    }
    public function getAvailableProductsByBrand(int $brand_id)
    {
        return $this->repository->productsByBrand($brand_id);
    }
    public function getAvailableProductsCountByBrand() {}
}
