<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\AttributesModel;
use App\Models\Brand;
use App\Models\CountryCurrency;
use App\Models\DeliveryZone;
use App\Models\ProductCategory;
use App\Models\ProductCurrencyPrice;
use App\Models\Stock;
use App\Models\Tag;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $product = new Product();
        $attributes =  AttributesModel::allActivated();
        $categories = ProductCategory::allActivated();
        // Agrupar categorías por su padre
        $groupedCategories = $categories->groupBy('category_parent_name');
        // Obtener categorías principales (sin padre)
        $mainCategories = $categories->whereNull('category_parent_name');
        $brands = Brand::allActivated();
        $deliveryZones = DeliveryZone::allActivated();
        $units = Unit::allActivated();
        $currencies = CountryCurrency::allActivated();

        return view('product.create', compact('product', 'groupedCategories', 'mainCategories', 'currencies', 'units', 'categories', 'attributes', 'brands', 'deliveryZones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {

        $data = $request->only(
            [
                'name', //OK
                'sku', //OK
                'sale_price', //OK
                'discounted_price', //OK
                'start_date_discounted_price', //OK
                'end_date_discounted_price', //OK
                'quantity_available', //OK
                'minimum_quantity', //OK
                'maximum_quantity',
                'purchase_price', //OK
                'expiration_date', //OK
                'expiry_period_type', //ok
                'expiry_period', //ok
                'outstanding_image',
                'description', //OK
                'description_small', //OK
                'purchase_price',      //OK
                'enable_stock', //OK
                'brand_id', //ok
                'terms_id', //ok
                'enable_reservation', //ok
                'deliveryZones', //ok
                'tag_id', //OK
                'weight',
                'category_id',
                'height',
                'width',
                'length',
                'enable_variations',
                'unit_id', //ok
                'enable_delivery', //ok
                'is_activated', //ok
                'code_currency_default',
                'currencies_products',
                'profit_margin_percentage',
                'profit_amount',
                'currency_id'
            ]
        );

        DB::beginTransaction();
        try {

            $data['enable_delivery'] = (isset($data['deliveryZones']) && count($data['deliveryZones']) > 0);
            $data['model_id'] = $request->input('model_id', null);
            $request->validate([
                'outstanding_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp' // tamaño máximo 2MB
            ]);

            // Usar el helper para subir la imagen y obtener la ruta
            $imagePath = upload_image($request->file('outstanding_image'));
            $data['outstanding_image'] =  $imagePath;






            // Convertir is_activated a un valor entero (1 o 0)
            $data['is_activated'] = $request->has('is_activated') ? 1 : 0;
            $data['enable_stock'] = isset($data['enable_stock']) && $data['enable_stock'] == 'on' ? 1 : 0;
            $data['enable_reservation'] = isset($data['enable_reservation']) && $data['enable_reservation'] == 'on' ? 1 : 0;
            if ($data['sale_price'] === '') {
                unset($data['sale_price']); // Esto hará que el valor sea nulo en la base de datos
            }
            if ($data['discounted_price'] === '') {
                unset($data['discounted_price']); // Esto hará que el valor sea nulo en la base de datos
            }
            if ($data['model_id'] === '') {
                unset($data['model_id']); // Esto hará que el valor sea nulo en la base de datos
            }
            if ($data['start_date_discounted_price'] === '') {
                unset($data['start_date_discounted_price    ']); // Esto hará que el valor sea nulo en la base de datos
            }
            if (empty($data['start_date_discounted_price'])) {
                unset($data['start_date_discounted_price']);
            }
            if (empty($data['end_date_discounted_price'])) {
                unset($data['end_date_discounted_price']);
            }
            if ($data['purchase_price'] === '') {
                unset($data['purchase_price']); // Esto hará que el valor sea nulo en la base de datos
            }
            if (empty($data['expiration_date'])) {
                unset($data['expiration_date']);
            }
            if ($data['expiry_period'] === '') {
                unset($data['expiry_period']);
            }

            // Obtenemos el array de monedas desde la request


            if (isset($data['currency_id'])) {
                $currency = CountryCurrency::where('currency_id', $data['currency_id'])->first();
            } else {
                $currency = CountryCurrency::where('code_currency_default', true)->first();
            }

            $data['code_currency_default'] = $currency->currency->code;

            // Obtén la moneda default (por ejemplo, del request o de alguna lógica)
            $codeCurrencyDefault = $currency->currency->code; // o de otra fuente

            // Después, en la lógica de crear el producto:
            $currencies = $request->input('currencies_products', []);

            $filteredCurrencies = array_filter($currencies, function ($currency) use ($codeCurrencyDefault) {
                return $currency !== $codeCurrencyDefault;
            });

            // Asignar en $data
            $data['supported_currencies'] = $filteredCurrencies;



            // Crea el producto
            $product = Product::create($data);

            if ($request->has('deliveryZones') && count($request->input('deliveryZones')) > 0) {
                $data['enable_delivery'] = true; // Hay delivery zones, habilitamos la entrega
                $product->deliveryZones()->attach($request->input('deliveryZones'));
            } else {
                $data['enable_delivery'] = false; // No hay delivery zones, deshabilitamos la entrega
            }

            // Manejo de categorías
            $product->categories()->attach($data['category_id']);

            // Manejo de tags (opcional)
            if (!empty($request->tag_id)) {
                $tags = explode(',', $request->tag_id);
                // Crear las etiquetas en un solo paso
                $tagIds = [];
                foreach ($tags as $tag) {
                    $tagCreated = Tag::firstOrCreate(['name' => trim($tag)]);
                    $tagIds[] = $tagCreated->id; // Guardar el ID de la etiqueta creada o existente
                }                // Asociar las etiquetas al producto
                $product->tags()->attach($tagIds);
            }

            Stock::create([
                'warehouse_id' => null,
                'quantity_available' => $request["quantity_available"],
                'minimum_quantity' => $request["minimum_quantity"],
                'maximum_quantity' => $request["maximum_quantity"],
                'product_id' => $product->id,
            ]);


            if (isset($data['terms_id'])) {
                // Convertimos la cadena en un array (por ejemplo, "5,6,7" a [5, 6, 7])
                $termsIds = explode(',', $data['terms_id']);

                // Asegúrate de que los IDs son enteros y eliminar valores vacíos
                $termsIds = array_filter(array_map('intval', $termsIds));

                // Luego puedes adjuntarlos a la relación
                $product->terms()->attach($termsIds);
            }



            $price = new ProductCurrencyPrice();
            $price->product()->associate($product); // O $price->product_id = $productId;
            $price->currency_id = $currency->id; // O $price->currency_id = $currencyId;

            $price->sale_price = $data['sale_price']; // Si lo usas

            $purchasePrice = $data['purchase_price'] ?? 0;
            $purchasePrice = is_numeric($purchasePrice) ? $purchasePrice : 0;
            $price->purchase_price = $purchasePrice;

            $discountedPrice = $data['discount_price'] ?? 0;
            $discountedPrice = is_numeric($discountedPrice) ? $discountedPrice : 0;
            $price->discount_price = $discountedPrice;

            $profitMargin = $data['profit_margin_percentage'] ?? 0;
            $profitMargin = is_numeric($profitMargin) ? $profitMargin : 0;
            $price->profit_margin_percentage = $profitMargin;

            $profitAmount = $data['profit_amount'] ?? 0;
            $profitAmount = is_numeric($profitAmount) ? $profitAmount : 0;
            $price->profit_amount = $profitAmount;
            $price->save();


            DB::commit();
            return Redirect::route('products.index')
                ->with('success', 'Producto ' . __('validation.attributes.successfully_created'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.create')->withErrors(['error' => 'Error al crear el producto.' . $e]);
        }
    }
    public function productsExchangeRates($currency)
    {        // $currency = $request->session()->get('currency', 'MN'); // Moneda por defecto
        $products = Product::allActivated();

        foreach ($products as $product) {
            $product = $this->productExchangeRate($currency, $product);
        }
        return
            [
                'products' => $products,
                'currency' => $currency
            ];
    }


    public function getProductExchangeRate(ProductRequest $request)
    {
        $data = [
            "products" => $request->products_id,
            "currency" => $request->currency
        ];

        // Crear una colección para almacenar los productos procesados
        $productsCollection = collect();

        // Recorrer cada ID de producto
        foreach ($data['products'] as $product_id) {
            // Obtener el producto por ID
            $product = Product::find($product_id);
            //Incrementar visitas del producto
            $product->increment('views');
            // Verifica si el producto fue encontrado
            if ($product) {
                // Calcular la tasa de cambio para el producto
                $productWithExchangeRate = $this->productExchangeRate($data['currency'], $product);

                // Adicionar el producto procesado a la colección
                $productsCollection->push($productWithExchangeRate);
            }
        }
        return $productsCollection;
        // Retornar la colección de productos junto con la moneda
        return   [
            'products' => $productsCollection,
            'currency' => $data['currency']
        ];
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $product = Product::find($id);


        $productCategories = Product::with('categories')->findOrFail($id);
        $productTerms = Product::with(['terms.attribute'])->findOrFail($id);
        // Obtener la cantidad de productos en la primera categoría del producto (si el producto tiene varias categorías)
        $categoryCounts = $product->categories->map(function ($category) {
            return [
                'id' => $category->id,
                'category' => $category->name,
                'product_count' => $category->products()->count(), // Se refiere a la relación del modelo Category
            ];
        });
        $groupedTerms = [];

        foreach ($productTerms->terms as $term) {
            $attributeName = optional($term->attribute)->name; // Asegúrate de que 'name' es el campo correcto en tu modelo

            if ($attributeName) {
                // Inicializa el array si no existe
                if (!isset($groupedTerms[$attributeName])) {
                    $groupedTerms[$attributeName] = [];
                }

                // Agrega el término al grupo
                $groupedTerms[$attributeName][] = $term->name; // Asegúrate de que 'name' es el campo correcto
            }
        }
        return view('product.show', compact('product', 'categoryCounts', 'groupedTerms'));
    }
    public function showList($id): View
    {

        $product = Product::find($id);
        $productCategories = Product::with('categories')->findOrFail($id);
        $productTerms = Product::with(['terms.attribute'])->findOrFail($id);

        // Obtener la cantidad de productos en la primera categoría del producto (si el producto tiene varias categorías)
        $categoryCounts = $product->categories->map(function ($category) {
            return [
                'id' => $category->id,
                'category' => $category->name,
                'product_count' => $category->products()->count(), // Se refiere a la relación del modelo Category
            ];
        });



        // Agrupar términos por atributo
        $groupedTerms = [];

        foreach ($productTerms->terms as $term) {
            $attributeName = optional($term->attribute)->name; // Asegúrate de que 'name' es el campo correcto en tu modelo

            if ($attributeName) {
                // Inicializa el array si no existe
                if (!isset($groupedTerms[$attributeName])) {
                    $groupedTerms[$attributeName] = [];
                }

                // Agrega el término al grupo
                $groupedTerms[$attributeName][] = $term->name; // Asegúrate de que 'name' es el campo correcto
            }
        }
        return view('product.show-list', compact('product', 'categoryCounts', 'groupedTerms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {

        $product = Product::find($id);
        $attributes =  AttributesModel::allActivated();
        $categories = ProductCategory::allActivated();
        $brands = Brand::allActivated();
        $deliveryZones = DeliveryZone::allActivated();
        $units = Unit::allActivated();
        $currencies = CountryCurrency::allActivated();
        // Agrupar categorías por su padre
        $groupedCategories = $categories->groupBy('category_parent_name');
        // Obtener categorías principales (sin padre)
        $mainCategories = $categories->whereNull('category_parent_name');

        return view('product.edit', compact('currencies', 'groupedCategories', 'mainCategories', 'product', 'units', 'categories', 'attributes', 'brands', 'deliveryZones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $request->validate([
            'outstanding_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // más reglas si necesitas
        ]);

        $data = $request->only([
            'name',
            'sku',
            'sale_price',
            'discounted_price',
            'start_date_discounted_price',
            'end_date_discounted_price',
            'quantity_available',
            'minimum_quantity',
            'maximum_quantity',
            'purchase_price',
            'expiration_date',
            'expiry_period_type',
            'expiry_period',
            'outstanding_image',
            'description',
            'description_small',
            'enable_stock',
            'brand_id',
            'terms_id',
            'enable_reservation',
            'deliveryZones',
            'tag_id',
            'weight',
            'category_id',
            'height',
            'width',
            'length',
            'enable_variations',
            'unit_id',
            'enable_delivery',
            'is_activated',
            'code_currency_default',
            'currencies_products',
            'profit_margin_percentage',
            'profit_amount',
            'currency_id'
        ]);

        DB::beginTransaction();

        try {
            // Imagen
            if ($request->hasFile('outstanding_image')) {
                $data['outstanding_image'] = upload_image($request->file('outstanding_image'));
            }

            // Flags
            $data['is_activated'] = $request->has('is_activated') ? 1 : 0;
            $data['enable_stock'] = isset($data['enable_stock']) && $data['enable_stock'] == 'on' ? 1 : 0;
            $data['enable_reservation'] = isset($data['enable_reservation']) && $data['enable_reservation'] == 'on' ? 1 : 0;

            // Convertir vacíos a null
            foreach (
                [
                    'sale_price',
                    'discounted_price',
                    'model_id',
                    'start_date_discounted_price',
                    'end_date_discounted_price',
                    'purchase_price',
                    'expiration_date',
                    'expiry_period'
                ] as $field
            ) {
                if (isset($data[$field]) && ($data[$field] === '' || $data[$field] === null)) {
                    $data[$field] = null;
                }
            }

            // Fechas opcionales
            if (empty($data['start_date_discounted_price'])) unset($data['start_date_discounted_price']);
            if (empty($data['end_date_discounted_price'])) unset($data['end_date_discounted_price']);
            if (empty($data['expiration_date'])) unset($data['expiration_date']);

            // Moneda
            if (isset($data['currency_id'])) {
                $currency = CountryCurrency::where('currency_id', $data['currency_id'])->first();
            } else {
                $currency = CountryCurrency::where('code_currency_default', true)->first();
            }
            $data['code_currency_default'] = $currency->currency->code;

            // Cargar y filtrar monedas soportadas
            $currencies = $request->input('currencies_products', []);
            $filteredCurrencies = array_filter($currencies, fn($c) => $c !== $data['code_currency_default']);
            $data['supported_currencies'] = $filteredCurrencies;

            // Actualizar producto
            $product->update($data);


            // **Gestionar categorías**: eliminar las existentes y poner las nuevas
            if (isset($data['category_id'])) {
                $product->categories()->sync($data['category_id']);
            }

            // **Gestionar tags**: eliminar existentes y agregar las nuevas
            if (!empty($request->tag_id)) {
                $product->tags()->detach();
                $tags = explode(',', $request->tag_id);
                $tagIds = [];
                foreach ($tags as $tag) {
                    $tagCreated = Tag::firstOrCreate(['name' => trim($tag)]);
                    $tagIds[] = $tagCreated->id;
                }
                $product->tags()->attach($tagIds);
            }

            // **Gestionar deliveryZones**: sincronizar (eliminar y agregar)
            if ($request->has('deliveryZones')) {
                $product->deliveryZones()->sync($request->input('deliveryZones'));
            } else {
                $product->deliveryZones()->detach();
            }

            // **Gestionar stock**: actualizar si existe, crear si no
            $stock = $product->stocks()->first();
            if ($stock) {
                $stock->update([
                    'quantity_available' => $data['quantity_available'],
                    'minimum_quantity' => $data['minimum_quantity'],
                    'maximum_quantity' => $data['maximum_quantity'],
                ]);
            } else {
                Stock::create([
                    'warehouse_id' => null,
                    'quantity_available' => $data['quantity_available'],
                    'minimum_quantity' => $data['minimum_quantity'],
                    'maximum_quantity' => $data['maximum_quantity'],
                    'product_id' => $product->id,
                ]);
            }

            // **Gestionar términos**
            if (isset($data['terms_id'])) {
                $termsIds = array_filter(array_map('intval', explode(',', $data['terms_id'])));
                $product->terms()->sync($termsIds);
            }

            // **Gestionar precio**
            $price = $product->currencyPrices()->first();
            if (!$price) {
                $price = new ProductCurrencyPrice();
                $price->product()->associate($product);
            }

            $price->currency_id = $currency->id;
            $price->sale_price = $data['sale_price'];
            $price->purchase_price = is_numeric($data['purchase_price'] ?? 0) ? $data['purchase_price'] : 0;
            $price->discount_price = isset($data['discounted_price']) ? $data['discounted_price'] : null;
            $price->profit_margin_percentage = is_numeric($data['profit_margin_percentage'] ?? 0) ? $data['profit_margin_percentage'] : 0;
            $price->profit_amount = is_numeric($data['profit_amount'] ?? 0) ? $data['profit_amount'] : 0;
            $price->save();

            DB::commit();
            return redirect()->route('products.index')->with('success', __('Producto actualizado correctamente.'));
        } catch (\Exception $e) {
            DB::rollBack();
            // Opcional: loguear error
            Log::error('Error al actualizar producto: ', [$e->getMessage()]);

            return redirect()->route('products.edit', $product->id)->withErrors(['error' => 'Error al editar el producto.' . $e]);
        }
    }

    public function destroy($id): RedirectResponse
    {
        Product::find($id)->delete();

        return Redirect::route('products.index')
            ->with('success', 'Producto ' .  __('validation.attributes.successfully_removed'));
    }
}
