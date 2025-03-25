<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartRepository
{

    // Inicializa el carrito de la sesión

    // Inicializa el carrito de la sesión


    // Método para añadir el producto al carrito
    public function addProduct($productId, $quantity)
    {
        // Obtiene el carrito actual desde la sesión
        $cart = Session::get('cart');
        Log::info('Obteniendo el valor del carrito en la sesion :', [$cart]);
        // Verifica si el producto existe
        $product = Product::find($productId);

        // Debug: registra lo que estás intentando añadir
        Log::info('Intentando añadir producto al carrito:', [
            'productId' => $productId,
            'quantity' => $quantity,
            'currentCart' => $cart
        ]);

        if ($product && $product->stock->quantity_available >= $quantity) {
            // Si el producto ya existe en el carrito
            if (isset($cart[$productId])) {
                // Aumenta la cantidad
                $cart[$productId]['quantity'] += $quantity;
                Log::info('Producto existe y se aumenta al carrito:', [$cart[$productId]['quantity']]);
            } else {
                // Si no existe, lo añade
                $cart[$productId] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
                Log::info('Producto no existe y se crea:', [$cart[$productId]]);
            }

            // Actualiza el carrito en la sesión
            Session::put('cart', $cart);
            Log::info('nuevo valor de session :', [$cart]);
            // Registra la acción exitosa
            Log::info('Producto añadido al carrito:', [$productId, $cart[$productId]]);

            return true; // Indica que la acción fue exitosa
        }

        // Log para producto no encontrado o sin suficiente stock
        Log::warning('No se pudo añadir el producto al carrito:', [
            'productId' => $productId,
            'stockAvailable' => $product ? $product->stock : 'N/A'
        ]);

        return false; // Indica que el producto no pudo ser añadido
    }


    // Método para eliminar un producto del carrito
    public function removeProduct($productId)
    {
        $cart = Session::get('cart');
        unset($cart[$productId]);
        Session::put('cart', $cart);
    }

    // Método para limpiar el carrito
    public function clearCart()
    {
        Session::forget('cart');
    }

    // Método para obtener el carrito
    public function getCart()
    {
        return Session::get('cart');
    }

    // Método para crear una orden
    public function createOrder($temporaryId, $personId)
    {
        $order = Order::create([
            'temporary_id' => $temporaryId,
            'person_id' => $personId,
            'status_id' => 1 // Cambia según tus estados
        ]);

        $cart = $this->getCart();

        foreach ($cart as $item) {
            $order->products()->attach($item['product']->id, [
                'quantity' => $item['quantity'],
                'price' => $item['product']->price
            ]);
        }

        return $order;
    }
}
