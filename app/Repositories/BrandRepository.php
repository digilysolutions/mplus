<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\Product;
use App\Repositories\BaseRepository;


class BrandRepository extends BaseRepository
{
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'description',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }
    public function model(): string
    {
        return Brand::class;
    }
    /**  
     * Contar la cantidad de productos por marca.  
     *  
     * @param string $brand  
     * @return int  
     */
    public function countByBrand(int $brand_id): int
    {
        return $this->productsByBrand($brand_id)->count();   // retorna la cantidad de productos existentes de una marca  

    }


    /****
     * Retorna los productos existentes en el almacen de una marca 
     */

    public function productsByBrand(int $brand_id)
    {
        return Product::where('brand_id', $brand_id)
            ->where('enable_stock', '=', true); // Solo cuenta si existe en el almacen  

    }

    public function  findRepoBrandProducts($id)
    {
        return  Brand::with('products')->find($id);
    }
    public function findAllBrandsWithProducts()
    {
        
        return Brand::with('products')->get();
    }
}
