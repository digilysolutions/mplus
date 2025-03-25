<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'name',
        'description',
        'description_small',
        'sku',
        'expiration_date',
        'expiry_period_type',
        'expiry_period',
        'outstanding_image',
        'purchase_price',
        'sale_price',
        'weight',
        'height',
        'enable_reservation',
        'length',
        'enable_stock',
        'enable_variations',
        'brand_id',
        'views',
        'sales',
        'model_id',
        'tag_id',
        'unit_id',
        'discounted_price',
        'start_date_discounted_price',
        'end_date_discounted_price',
        'enable_delivery',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Product::class;
    }
    public function findAllProducts()
    {
        return Product::with('unit', 'rating', 'tags', 'reviews', 'images', 'currencies', 'terms', 'stock')->get();
    }
    public function findRepoProductId($id)
    {
        return  Product::with('terms.attribute', 'images', 'stock')->find($id);
    }

    //Obtener productos más vendidos
    public function bestSellingProducts()
    {
        // Obtener productos ordenados por ventas de forma descendente
      //  $bestSellingProducts = Product::orderBy('sales', 'desc')->take(8)->get();
        $bestSellingProducts = Product::orderBy('sales', 'desc')->get();
        return view('best_selling', [
            'bestSellingProducts' => $bestSellingProducts,
        ]);
    }

    //Obtener productos con mas vistas
    public function mostViewedProducts()
    {
        // Obtener productos ordenados por vistas de forma descendente
       // $mostViewedProducts = Product::orderBy('views', 'desc')->take(8)->get();
        $mostViewedProducts = Product::orderBy('views', 'desc')->get();
        return view('most_viewed', [
            'mostViewedProducts' => $mostViewedProducts,
        ]);
    }
}
