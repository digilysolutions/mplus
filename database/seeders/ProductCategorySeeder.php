<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //category_parent
        ProductCategory::create([
            'name' => 'Alimentos',
            'description' => 'Descripcion de la categoria',
            'path_image' => '/img/upload/alimentos.webp',

            'code_currency_default' => 'MN'

        ]);   //Id: 1
        ProductCategory::create([
            'name' => 'Electrodomésticos',
            'path_image' => '/img/upload/electrodomesticos.webp',

            'code_currency_default' => 'MN'
        ]); //Id: 2

        ProductCategory::create([
            'name' => 'Moda',
            'path_image' => '/img/upload/moda.webp',

            'code_currency_default' => 'MN'
        ]); //Id: 3
        ProductCategory::create([
            'name' => 'Tecnología',
            'path_image' => '/img/upload/tecnologias.webp',

            'code_currency_default' => 'MN'
        ]); //Id: 4

    }
}
