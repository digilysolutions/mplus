<?php

namespace App\Http\Controllers;

use App\Models\CountryCurrency;
use App\Models\DeliveryZone;
use App\Models\Stock;
use App\Services\CartService;
use App\Services\CountryCurrencyService;
use App\Services\DeliveryZoneService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $productsService;
    protected $countryCurrencyService;
    protected $deliveryZones;
    public function __construct(DeliveryZoneService $deliveryZones, ProductService $productsService, CountryCurrencyService $countryCurrencyService)
    {
        $this->productsService = $productsService;
        $this->countryCurrencyService = $countryCurrencyService;

        $this->deliveryZones = $deliveryZones;
    }

    public function addProduct1(Request $request)
    {

        // Valida los datos entrantes
        /* $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);*/
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $currency = Session::get('currency');
        $dataProduct = [
            'products_id' => [$request->product_id],
            'currency' => $currency
        ];
        $cart = Session::get('cart');
        // Verifica si el producto existe
        // $product = $this->productsService->exchangeRateProduct($dataProduct)[0];

        $product = $this->productsService->findById($request->product_id);
        $productWithExchangeRate = $this->productExchangeRate($currency, $product);

        // $product = $this->productsService->showProduct($request->product_id)['data']['product'];
        /* if ($product && $product['stock'] != null && $product['stock']['quantity_available'] < $request->quantity)
            return Session::get('cart');*/

        // Si el producto ya existe en el carrito
        if (isset($cart[$request->product_id])) {
            // Aumenta la cantidad
            $cart[$request->product_id]['quantity'] += $request->quantity;
        } else {

            // Si no existe, lo añade
            $cart[$request->product_id] = [
                'id' =>  $productWithExchangeRate['id'],
                'outstanding_image' =>  $productWithExchangeRate['outstanding_image'],
                'name' =>  $productWithExchangeRate['name'],
                'sale_price' => (empty($productWithExchangeRate['discounted_price']))
                    ? $productWithExchangeRate['sale_price']
                    : $productWithExchangeRate['discounted_price'],
                'quantity' => $request->quantity,
                'category' => $productWithExchangeRate->categories[0] ?? null
            ];
        }
        Session::put('cart', $cart);

        return Session::get('cart');
    }

    public function addProduct(Request $request)
{
    // Validar los datos entrantes
    $request->validate([
        'product_id' => 'required|integer|exists:products,id', // Asegurando que el producto exista
        'quantity' => 'required|integer|min:1',
    ]);

    $currency = Session::get('currency');
    $cart = Session::get('cart', []); // Obtener el carrito o inicializarlo como vacío si no existe
    $product = $this->productsService->findById($request->product_id);

    // Retornar un error si el producto no se encuentra
    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    // Aplicar la tasa de cambio al producto
    $productWithExchangeRate = $this->productExchangeRate($currency, $product);
    $salePrice = empty($productWithExchangeRate['discounted_price'])
        ? $productWithExchangeRate['sale_price']
        : $productWithExchangeRate['discounted_price'];

    $existProduct = false;

    foreach ($cart as $key => $item) {
        // Si el 'id' del producto en el carrito coincide con el 'product_id' en la solicitud
        if ($item['id'] == $request->product_id) {
            // Calcular la nueva cantidad
            $newQuantity = $item['quantity'] + $request->quantity;
            $cart[$key]['quantity'] = $newQuantity;
            $existProduct = true; // Marcar que el producto existe
            break; // Salir del bucle una vez encontrado y actualizado el producto
        }
    }

    // Si no existe, añadirlo al carrito
    if (!$existProduct) {
        $cart[$request->product_id] = [
            'id' => $productWithExchangeRate['id'],
            'outstanding_image' => $productWithExchangeRate['outstanding_image'],
            'name' => $productWithExchangeRate['name'],
            'sale_price' => $salePrice,
            'quantity' => $request->quantity,
            'category' => $productWithExchangeRate['categories'][0] ?? null,
        ];
    }

    // Actualizar el carrito en la sesión
    Session::put('cart', $cart);

    // Retornar el carrito actualizado
    return response()->json($cart);
}

    private function productExchangeRate($currency, $product)
    {
        $conversionData = $this->countryCurrencyService->convertPrice($product, $currency);
        $product->sale_price = $conversionData['converted_price'];
        $product->discounted_price = $conversionData['converted_discount_price'];
        $product->code_currency_default = $conversionData['currency'];
        return $product;
    }

    //Elimina la cantidad de productos del carrito de uno en uno y si esta en cero lo borra del carrito
    public function removeProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Session::get('cart');

        // Verificar si el carrito no está vacío
        if ($cart) {
            foreach ($cart as $key => $item) {
                // Si el 'id' del producto en el carrito coincide con el 'product_id' en la solicitud
                if ($item['id'] == $request->product_id) {
                    // Calcular la nueva cantidad
                    $newQuantity = $item['quantity'] - $request->quantity;

                    // Si la nueva cantidad es menor a 1, eliminar el producto del carrito
                    if ($newQuantity <= 0) {
                        unset($cart[$key]);
                    } else {
                        // De lo contrario, actualizar la cantidad del producto en el carrito
                        $cart[$key]['quantity'] = $newQuantity;
                    }

                    // Salir del bucle una vez encontrado y actualizado/eliminado el producto
                    break;
                }
            }
        }

        // Guardar el carrito actualizado en la sesión
        Session::put('cart', $cart);
        return $this->showCart();
    }


    public function checkout(Request $request)
    {
        /* $person = Person::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );
        $order = $this->cartRepository->createOrder(session('temporary_id'), $person->id);
        $this->cartRepository->clearCart();

        return response()->json($order);*/
    }

    public function showCart()
    {
        $cart = Session::get('cart');
        // Para fines de depuración
        // return Session::get('cart');
        return response()->json($cart);
    }
    public function existProduct(Request $request)
    {

        $cart = Session::get('cart');
        if (isset($cart[$request->id]['id'])) {
            return [
                'exists' => true,
                'quantity' => $cart[$request->id]['quantity']
            ];
        }
        return [
            'exists' => false,
            'quantity' => 0
        ];
    }
    public function showInfoCart()
    {

        $info = $this->infoCart();
        $currency =  $info['currency'];
        $deliveryZones =  $info['deliveryZones'];
        $products =  $info['products'];
        $countryCurrencies =  $info['countryCurrencies'];


        return view('app.cart', compact('currency', 'countryCurrencies', 'products', 'deliveryZones'));
    }
    public function infoCart()
    {
        $products = Session::get('cart', []);
        $deliveryZones = DeliveryZone::allActivated();
        $currency = Session::get('currency');
        $countryCurrencies = CountryCurrency::allActivated();
        return [
            'deliveryZones' => $deliveryZones,
            'currency' => $currency,
            'products' => $products,
            'countryCurrencies' => $countryCurrencies
        ];
    }
}
