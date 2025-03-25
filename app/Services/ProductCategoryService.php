<?php

namespace App\Services;

use App\Models\ProductCategory;
use App\Repositories\ProductCategoryRepository;

class ProductCategoryService extends BaseService
{

    public function __construct(ProductCategoryRepository $productCategoryRepo)
    {
        parent::__construct($productCategoryRepo);
    }
    public function findByIdWithProducts($id)
    {
        return ProductCategory::with('products')->find($id); // Asegúrate de usar `with` para cargar productos.
    }
}
