<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NavbarController extends Controller
{


    public function getMenuItemsCategories()
    {
        $menuCategories = ProductCategory::allActivated();

        // Convertir el array a una colección
        $categoriesCollection = collect($menuCategories); // Esto convierte el array a una colección

        // Filtrar las categorías que tienen productos
        $menuCategories = $categoriesCollection->filter(function ($category) {
            return count($category['products']) > 0;  // Solo devuelve categorías con productos
        });

        return $menuCategories;
    }

    function specialOffer()
    {
        $products = Product::allActivated();
        $specialOfferProducts = collect($products);

        // Comprobar si hay al menos un producto con la condición
        $hasDiscountedProducts = $specialOfferProducts->some(function ($product) {
            return $product['discounted_price'] > 0 && $product['discounted_price'] < $product['sale_price'];
        });

        return $hasDiscountedProducts; // Retorna verdadero o falso
    }
}
