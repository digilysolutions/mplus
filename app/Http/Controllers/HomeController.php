<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Contact;
use App\Models\CountryCurrency;
use App\Models\DeliveryZone;
use App\Models\Order;
use App\Models\Person;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\Stock;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{

    protected $filterProducts;
    public function __construct()
    {

        if (!Session::has('currency')) {
            Session::put('currency', 'USD'); // Establece un valor predeterminado
        }
        $this->filterProducts = collect();
    }
    public function index()
    {
        $currency = $this->getCurrency();
        $products = Product::allActivated();


        $randomProducts = $products->shuffle()->toArray();

        $latestProducts = collect($products);
        $latestProducts = $latestProducts->sortByDesc('created_at')->take(9);

        $featuredProducts = collect($products);
        $featuredProducts = $featuredProducts->sortByDesc('views')->take(9);

        $countryCurrencies = CountryCurrency::allActivated();
        $categories = ProductCategory::has('products')->get();


        return view('index', compact('latestProducts', 'categories', 'randomProducts', 'countryCurrencies', 'currency', 'featuredProducts'));
    }
    public function productsExchangeRates($currency)
    {
        Log::info('Mensaje de depuración en el productosExchangeRates');
        $products = $this->productsExchangeRatesCurrency($currency);


        $latestProducts = collect($products)
            ->sortByDesc('created_at')
            ->take(8);

        //  $countryCurrencies = CountryCurrency::allActivated();
        $this->updateCurrency($currency);
        // $cart = $this->productExchangeRate($currency, $products);
        $cart = $this->productExchangeRateCart();
        return response()->json(['cart' => $cart, 'latestProducts' => $latestProducts]);
    }

    public function detailsProduct($idProduct)
    {

        $currency = Session::get('currency');
        $dataProduct = [
            'products_id' => [$idProduct],
            'currency' => $currency
        ];
        $request = new Request($dataProduct);
        $product = $this->getProductExchangeRate($request);
        $products = Product::allActivated();
        $randomProducts = $products->shuffle()->toArray();


        //$data = $this->productsService->showProduct($idProduct);
        //$product = $data['data']['product'];
        // $averageRating = $data['data']['averageRating'];
        // $attributeTerms = $data['data']['attributeTerms'];
        // $currentPrice = $data['data']['currentPrice'];

        //$averageRating = $product['averageRating'];
        // $attributeTerms =$product['attributeTerms'];
        // $currentPrice = $product['currentPrice'];


        $currency = $this->getCurrency();
        $countryCurrencies = CountryCurrency::allActivated();
        $comments = $product->reviews;
        $ratings = $product->ratings;

        $termsArray = $product['terms'];
        $product_attribute_terms = [];
        foreach ($termsArray as $term) {
            $attribute_name = $term['attribute']['name'];
            if (!isset($product_attribute_terms['attribute'][$attribute_name])) {
                $product_attribute_terms['attribute'][$attribute_name] = [];
            }
            $product_attribute_terms['attribute'][$attribute_name][] = $term['name'];
        }

        //$cart =  Session::get('cart');


        return view('app.detailsproduct', compact('currency', 'ratings', 'randomProducts', 'product', 'countryCurrencies', 'product_attribute_terms', 'comments'));
    }

    public function show(int $id)
    {
        $product = Product::where('id', $id)->first();
        if ($product == null)
            return ['message' => 'No se encuentra el producto '];



        // Calcular el total de puntuaciones
        $totalRatings =  $product->rating->sum('rating');

        // Contar el número total de valoraciones
        $countRatings  = $product->rating->count();

        // Evitar división por cero
        $averageRating = $countRatings > 0 ? $totalRatings / $countRatings : 0;

        // Obtener atributos y términos usando el método del modelo
        $attributes = $product->getAttributesWithTerms();



        // Obtener la fecha actual
        $currentDate = Carbon::now();
        // Inicializar el precio que enviarás a la vista
        $currentPrice = 0; // Precio normal
        // Verificar condiciones para aplicar precio de rebaja y mostrarlo en la vista
        $discountApplicable = false;
        if (!empty($product->discounted_price)) {
            // Comprobar si existen ambas fechas
            if (!empty($product->start_date_discounted_price) && !empty($product->end_date_discounted_price)) {
                $startDate = Carbon::parse($product->start_date_discounted_price);
                $endDate = Carbon::parse($product->end_date_discounted_price);


                if ($startDate->lessThanOrEqualTo($currentDate) && $endDate->greaterThanOrEqualTo($currentDate)) {
                    $discountApplicable = true;
                }
            }
            // Comprobar si solo existe la fecha inicial
            elseif (!empty($product->start_date_discounted_price)) {
                $startDate = Carbon::parse($product->start_date_discounted_price);
                // Validar que la fecha inicial <= fecha actual
                if ($startDate->lessThanOrEqualTo($currentDate)) {
                    $discountApplicable = true;
                }
            }
            // Comprobar si solo existe la fecha final
            elseif (!empty($product->end_date_discounted_price)) {
                $endDate = Carbon::parse($product->end_date_discounted_price);

                // Validar que la fecha final >= fecha actual
                if ($endDate->greaterThanOrEqualTo($currentDate)) {
                    $discountApplicable = true;
                }
            }
        }
        // Si las condiciones se cumplen, asignar el precio de rebaja para mostrarlo en la vista
        if ($discountApplicable) {
            $currentPrice = $product->discounted_price; // Asignar el precio de descuento
        }


        // $product = $this->productExchangeRate( $data['currency'], $product);
        return [
            'product' => $product,
            'averageRating' => $averageRating,
            'attributeTerms' => $attributes,
            'currentPrice' => $currentPrice

        ];
    }
    public function getCurrency()
    {
        return Session::get('currency');
    }
    public function updateCurrency($currency)
    {
        Session::put('currency', $currency);
    }
    public function storeReview(Request $request)
    {
        $dataPerson = $request->only([
            'first_name',
            'phone'
        ]);
        $dataComment = $request->only([
            'product_id',
            'comment'
        ]);

        //Comprobar si el cliente existe, comprobando su phone y nombre
        //  $person  = $this->personService->findPersonByAttribute($dataPerson);

        // if (empty($person)) {

        $person = Person::create($dataPerson);

        // }
        $dataComment['writer_id'] = $person['data']['id'];
        $dataComment['is_activated'] = true;
        $comment = Review::create($dataComment);

        return $comment;
    }
    public function checkout($idDomicilio)
    {
        $cart = Session::get('cart', []); // Devuelve un array vacío si no hay carrito en la sesión

        // Verificar si el carrito está vacío
        if (empty($cart)) {
            return redirect('/')->with('message', 'Tu carrito está vacío.');
        }

        // Inicializar un arreglo para almacenar los productos válidos
        $validCart = [];
        // Inicializar un arreglo para almacenar los productos que se van a descontar del stock
        $productsToUpdateStock = [];

        // Iterar sobre los productos en el carrito
        foreach ($cart as $item) {

            // Encontrar el producto en la base de datos
            $product = Product::find($item['id']);

            // Comprobar si el producto existe y si está activado

            if ($product && $product->is_activated) {
                // Si el control de stock está habilitado

                if ($product->enable_stock) {
                    // Comprobar el stock disponible

                    $stock = Stock::where('product_id', $product->id)->first();
                    //TODO: Mejorar este xodigo con la disponibilidad de la almacen
                    if ($stock && $stock->quantity_available >= $item['quantity']) {

                        // Si hay suficiente stock, agregar el producto al carrito válido
                        $validCart[] = $item;
                        $productsToUpdateStock[] = [
                            'product_id' => $product->id,
                            'quantity' => $item['quantity']
                        ];
                    } else {
                        $validCart[] = $item;
                    }
                } else {
                    // Si no se controla el stock, agregarlo directamente
                    $validCart[] = $item;
                }
            }
        }

        // Actualizar el carrito en la sesión
        Session::put('cart', $validCart);

        // Si el carrito está vacío después de la validación
        if (empty($validCart)) {
            return redirect('/')->with('message', 'Todos los productos han sido eliminados del carrito porque no están disponibles.');
        }
        $cart = Session::get('cart', []);
        // Intenta realizar la operación en la transacción solo si hay productos válidos
        DB::transaction(function () use ($productsToUpdateStock) {
            foreach ($productsToUpdateStock as $item) {
                // Descontar el stock de cada producto
                $stock = Stock::where('product_id', $item['product_id'])->first();

                if ($stock) {
                    $stock->quantity_available -= $item['quantity'];
                    $stock->save();
                }
            }
        });

        // Obtener la zona de entrega si se pasó un ID válido
        $deliveryZone = null;
        if ($idDomicilio != 0) {
            $deliveryZone = DeliveryZone::find($idDomicilio);
        }

        // Obtener todas las zonas de entrega activadas
        $deliveryZones = DeliveryZone::allActivated();
        $currency = $this->getCurrency();
        $countryCurrencies = CountryCurrency::allActivated();

        // Devolver la vista del checkout con los datos necesarios
        return view('app.checkout', compact('deliveryZone', 'deliveryZones', 'cart', 'currency', 'countryCurrencies'));
    }





    public function orderPurchase(Request $request)
    {


        // Validar los datos del request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'string|max:255',
            'deliveryzona_id' => 'required|exists:delivery_zones,id',
            // Añadir otras validaciones según sea necesario
        ]);



        $cart = Session::get('cart');

        if (!is_array($cart) || empty($cart)) {
            return redirect()->back()->withErrors('El carrito está vacío.');
        }

        DB::beginTransaction();

        try {

            //Busca una persona por su teléfono, y si no se encuentra, la crea.
            $buyer = $this->findOrCreatePersonAndContact($request->name, $request->phone);

            $purchasePerson = $this->findOrCreatePersonAndContact($request->name_other_person, $request->phone_other_person);
            $deliveryPerson = $this->findOrCreatePersonAndContact($request->name_receives_purchase, $request->phone_receives_purchase);
            //Maneja la lógica de entrega, guardando los datos relevantes.
            $deliveryData = $this->handleDelivery($request);
            //Prepara los datos para la orden antes de guardarla en la base de datos.
            $orderData = $this->prepareOrderData($request, $cart, $buyer, $purchasePerson, $deliveryPerson, $deliveryData);


            // Crear la orden
            $order = Order::create($orderData);

            // Enviar vía WhatsApp


            DB::commit();

            Session::forget('cart');
            return  $this->sendWhatsapp(
                "53285232",
                $buyer,
                $purchasePerson,
                $deliveryPerson,
                $cart,
                $orderData['home_delivery'],
                $deliveryData,
                $orderData['subtotal_amount'],
                $orderData['total_amount'],
                $request['address'],
                $request['additional_information'],
                $request['currency']
            );

            return redirect()->route('home')->with('success', 'Orden realizada con éxito.');
        } catch (\Exception $ex) {
            DB::rollback();
            Log::error('Error al realizar la compra: ' . $ex->getMessage());
            return redirect()->back()->withErrors('Ocurrió un error: ' . $ex->getMessage());
        }
    }

    //findOrCreatePerson: Busca una persona por su teléfono, y si no se encuentra, la crea.
    private function findOrCreatePersonAndContact($name, $phone)
    {

        try {
            // Buscar contacto por teléfono
            $contact = Contact::where('phone', $phone)->first();

            // Crear usuario si no existe

            if (!$contact) {
                DB::beginTransaction();
                $user = null;
                // Crear usuario
                $user = User::create([
                    'name' => $name,
                    'roleid' => 2,
                    'role' => 'Usuario',
                    // aquí puedes agregar otros campos si quieres
                ]);

                // Crear contacto
                $contact = Contact::create([
                    'phone' => $phone,
                    'mobile' => $phone,
                    // Puedes agregar más campos desde $requestData si deseas
                ]);
                // Preparar datos para crear la persona
                $detailsPerson = [
                    'first_name' => $name,
                    'contact_id' => $contact->id,
                    'user_id' =>  $user->id,
                    'person_statuses_id' => 13, // Asumiendo que 13 es un estado válido

                ];

                // Crear persona
                $person = Person::create($detailsPerson);
                DB::commit();
                return $person;
            }
            return Person::where('contact_id', $contact->id)->first();
        } catch (\Exception $ex) {
            DB::rollback();
            Log::error('Error al crear la persona y contacto: ' . $ex->getMessage());
            // Dependiendo de tu flujo, puedes devolver null, throw, o manejar diferente
            throw $ex; // o puedes retornar null y manejar fuera
        }
    }

    //handleDelivery: Maneja la lógica de entrega, guardando los datos relevantes.
    private function handleDelivery(Request $request)
    {
        $data = [];
        if ($request->is_delivery) {
            // Cargar la zona de entrega
            $deliveryZone = DeliveryZone::find($request->deliveryzona_id);

            if ($deliveryZone) {
                $data['delivery_name'] = $deliveryZone->location->name;
                $data['delivery_fee'] = $deliveryZone->price;
                $data['delivery_time'] = $deliveryZone->delivery_time;
                $data['time_unit'] = $deliveryZone->time_unit;
            }
        }

        return $data;
    }

    //prepareOrderData: Prepara los datos para la orden antes de guardarla en la base de datos.
    private function prepareOrderData(Request $request, $cart, $buyer, $purchasePerson, $deliveryPerson, $deliveryData)
    {

        $subtotal_amount = 0;
        $delivery_fee = $deliveryData['delivery_fee'] ?? 0;

        $nonExistentProducts = [];
        $inventoryIssues = [];
        $updatedCart = []; // Para guardar los productos ajustados

        foreach ($cart as $product) {
            // Obtener el modelo de producto desde la relación
            $productModel = Product::find($product['id']);

            if (!$productModel) {
                // Producto no encontrado
                $nonExistentProducts[] = [
                    'product_id' => $product['id'],
                    'product_name' => 'Desconocido',
                    'requested_quantity' => $product['quantity'],
                ];
                continue;
            }

            // Obtener stock asociado
            $stock = $productModel->stocks()->first(); // asumiendo relación hasOne o similar

            /*  if (!$stock) {
                // No hay stock registrado
                $nonExistentProducts[] = [
                    'product_id' => $productModel->id,
                    'product_name' => $productModel->name,
                    'requested_quantity' => $product['quantity'],
                ];
                continue;
            }*/

            // Verificar si el control de inventario está habilitado
            if ($productModel->enable_stock) {
                $currentStock = $stock->quantity_available ?? 0;

                if ($currentStock < $product['quantity']) {
                    // Stock insuficiente
                    $inventoryIssues[] = [
                        'product_id' => $productModel->id,
                        'product_name' => $productModel->name,
                        'requested_quantity' => $product['quantity'],
                        'available_quantity' => $currentStock,
                    ];
                    $quantityToCharge = $currentStock; // Solo cargar lo que hay
                    Log::warning("Stock insuficiente para {$productModel->name}, pedido: {$product['quantity']}, disponible: {$currentStock}");
                } else {
                    $quantityToCharge = $product['quantity'];
                }

                // Actualizar el stock si hay suficiente cantidad
                if ($quantityToCharge > 0) {
                    $stock->update([
                        'quantity_available' => $currentStock - $quantityToCharge
                    ]);
                }
            } else {
                // Si el control de stock no está habilitado, cargar la cantidad solicitada
                $quantityToCharge = $product['quantity'];
                Log::info("Control de stock desactivado para {$productModel->name}");
            }

            // Agregar al subtotal
            $subtotal_amount += $productModel->sale_price * $quantityToCharge;

            // Guardar en el carrito actualizado
            $updatedCart[] = [
                'id' => $productModel->id,
                'quantity' => $quantityToCharge,
                'sale_price' => $productModel->sale_price,
                // Otros datos que puedas necesitar
            ];
        }

        // Actualizar el carrito original con los productos ajustados
        $cart = $updatedCart;

        // Guardar en sesión o logs los problemas
        if (!empty($nonExistentProducts)) {
            Session::flash('non_existent_products', $nonExistentProducts);
        }
        if (!empty($inventoryIssues)) {
            Session::flash('inventory_issues', $inventoryIssues);
        }

        $total_amount = $subtotal_amount + $delivery_fee;

        // Preparar datos para la orden
        return [
            'home_delivery' => $request->is_delivery ? 1 : 0,
            'address' => $request->address,
            'deliveryzona_id' => $request->deliveryzona_id,
            'status_id' => 1,
            'time_unit' => $deliveryData['time_unit'] ?? 0,
            'delivery_time' => $deliveryData['delivery_time'] ?? 0,
            'purchase_date' => Carbon::now()->toDateString(),
            'currency' => Session::get('currency'),
            'subtotal_amount' => $request->subtotal_amount,
            'total_amount' => $request->total_amount,
            'delivery_fee' => $delivery_fee,
            'person_id' => $buyer->id,
            'purchase_person_id' => $purchasePerson->id,
            'delivery_person_id' => $deliveryPerson->id,
            // Puedes agregar más campos si es necesario
        ];
    }

    //primer codigo eliminarlo cuando termine...
    public function orderPurchase1(Request $request)
    {

        $cart = Session::get('cart');
        DB::beginTransaction();
        try {
            if (is_array($cart)) {
                $delivery_name = null;
                $delivery_fee = 0;
                $delivery_time = null;
                $time_unit = null;
                $subtotal_amount = 0;
                $total_amount = 0;
                $delivery_fee = 0;
                $deliveryZone = null;
                $data = [
                    'home_delivery' => $request->is_delivery,
                    'address' => $request->address,
                    'deliveryzona_id' => $request->deliveryzona_id,

                ];

                //Obtener de name y el phone la persona que realiza la oden  de la BD a ver si existe, de no existir la mando a crear y guardo el id de la persona para enviarla
                $detailsPersonBuyer = [
                    'first_name' => $request->name,
                    'phone' => $request->phone,
                ];

                $person =  Person::create($detailsPersonBuyer);


                $purchasePerson = $person;


                $detailsPersonPurchase = [
                    'first_name' => $request->name_other_person,
                    'phone' => $request->phone_other_person,
                ];
                if (!empty($request->phone_other_person) && !empty($request->name_other_person)) {

                    $purchasePerson = Person::create($detailsPersonPurchase);
                }

                $phone = $request->input('phone_receives_purchase');
                $name = $request->input('name_receives_purchase');

                if (!empty($phone) && !empty($name)) {
                    $detailsPersonDelivery = [
                        'first_name' => $name,
                        'phone' => $phone,
                    ];
                    $deliveryPerson = Person::create($detailsPersonDelivery);
                    $data['delivery_person_id'] = $deliveryPerson['data']['id'];
                }
                $data['home_delivery'] = isset($data['home_delivery']) && $data['home_delivery'] == 'on' ? 1 : 0;
                if ($data['home_delivery']) {
                    $deliveryZone = DeliveryZone::fid($data['deliveryzona_id']);
                    $delivery_name = $deliveryZone['location']['name'];
                    $delivery_fee = $deliveryZone['price'];
                    $delivery_time = $deliveryZone['delivery_time'];
                    $time_unit = $deliveryZone['time_unit'];
                }


                $purchase_date = Carbon::now()->format('d/m/Y');

                $currency = Session::get('currency');


                // Asegúrate de que $cart sea un array


                foreach ($cart as $product) {
                    $subtotal_amount += $product['sale_price'] * $product['quantity'];
                }

                $total_amount = $subtotal_amount + $delivery_fee;

                $data['status_id'] = 1;
                $data['time_unit'] =  $time_unit ?? 0;
                $data['delivery_time'] = $delivery_time ?? "";
                $data['purchase_date'] = $purchase_date;
                $data['currency'] = $currency;
                $data['subtotal_amount'] = $subtotal_amount;
                $data['total_amount'] = $total_amount;
                $data['delivery_fee'] = $delivery_fee;
                $data['person_id'] = $person['data']['id'];
                $data['purchase_person_id'] = $purchasePerson['data']['id'];

                $order = Order::create($data);
                DB::commit();
            }
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->withErrors('Ocurrió un error: ' . $ex->getMessage());
            Log::info($ex);
        }
        Session::forget('cart');
        return view('/');
    }
    public function sendWhatsapp(
        $whatsapp,
        $detailsPersonBuyer,
        $detailsPersonPurchase,
        $detailsPersonDelivery,
        $products,
        $home_delivery,
        $deliveryData,
        $subtotal_amount,
        $total_amount,
        $address,
        $additional_information,
        $currency
    ) {

        if ($home_delivery) {
            $delivery = "
         Domicilio: Si
         Zona: {$deliveryData['delivery_name']}
         Tiempo de entrega: {$deliveryData['delivery_time']} {$deliveryData['time_unit']}
        ";
        } else {
            $delivery = "Domicilio: No";
        }


        $message = "*RPG Solutions*\n\n";
        $message .= "¡Gracias por confiar en RPG Solutions! Su pedido ha sido recibido y aquí le enviamos su número de orden para que pueda verificar el estado de su solicitud.\n\n";
        $message .= "🛒 *Orden de Compra*\n";
        $message .= "Número de Orden: *m525pl7w33*\n";
        $message .= "*Moneda:*" . $currency . "\n\n";

        $message .= "📝 *Detalle del Pedido:*\n";
        $message .= "Cantidad | Producto | Precio\n";
        $message .= "-----------------------------------\n";

        foreach ($products as $product) {
            $message .= sprintf(
                "%8s | %-30s | $%s\n",
                $product['quantity'],
                substr($product['name'], 0, 30),
                number_format($product['sale_price'], 2)
            );
        }

        $message .= "\n💰 *Resumen de la Orden:*\n";
        $message .= "*Subtotal:* $" . number_format($subtotal_amount, 2) . "\n";
        $message .= "*Descuento:* -$" . number_format(0, 2) . "\n";
        $message .= "*Domicilio:* $" . number_format($deliveryData['delivery_fee'] ?? 0, 2) . "\n";
        $message .= "*Total:* $" . number_format($total_amount, 2) . "\n\n";

        $message .= "📦 *Información del Pedido:*\n";
        $message .= "*Creador de la Orden:* " . $detailsPersonBuyer['first_name'] . "\n";
        $message .= "*Nombre del Comprador:* " . $detailsPersonPurchase['first_name'] . "\n";
        $message .= "*Nombre del Receptor:* " . $detailsPersonDelivery['first_name'] . "\n\n";
        // Domicilio y punto de referencia
        if ($home_delivery) {
            $message .= "🏠 *Domicilio:* Sí\n";
            $message .= "📍 Dirección: " . $address . "\n";
            $message .= "🔖 Punto de referencia: " . $additional_information . "\n\n";
        } else {
            $message .= "🏠 *Domicilio:* No\n\n";
        }
        // Datos de contacto
        $message .= "📞 Para dudas o consultas:\n";
        $message .= "✉️ Email: <mailto:commercialsolutions70@gmail.com>\n";
        $message .= "📱 Teléfonos: +53 59294241 | +53 53285232\n\n";
        // Dirección
        $message .= "📍 Dirección: Calle 25 #26, entre Marina y Hospital.\n\n";

        // Agradecimiento final
        $message .= "✨ ¡Gracias por su preferencia! ✨\n\n";
        $url = "https://wa.me/{$whatsapp}?text=" . urlencode($message);


        // Redirecciona a la URL externa
        return redirect()->away($url);
    }
    public function customerservice()
    {
        $countryCurrencies = CountryCurrency::allActivated();
        $currency = $this->getCurrency();
        return view('app.customerservice', compact('countryCurrencies', 'currency'));
    }
    public function contact()
    {
        $countryCurrencies = CountryCurrency::allActivated();
        $currency = $this->getCurrency();
        return view('app.contact', compact('countryCurrencies', 'currency'));
    }
    public function specialOffer()
    {
        $countryCurrencies = CountryCurrency::allActivated();
        $products = product::allActivated();
        $products = $products['data'];
        $specialOfferProducts = collect($products);

        // Filtrar los productos
        $specialOfferProducts = $specialOfferProducts->filter(function ($product) {
            return $product['discounted_price'] > 0 && $product['discounted_price'] < $product['sale_price'];
        });
        $currency = $this->getCurrency();
        return view('app.specialoffer', compact('countryCurrencies', 'currency', 'specialOfferProducts'));
    }
    public function sendMessageContact(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:15',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2500',
        ]);

        // Obtener los datos
        $name = $request->input('name');
        $whatsapp = $request->input('whatsapp');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Número del WhatsApp de la empresa (asegúrate de que este sea el formato correcto)
        $whatsappNumber = '5353947137';

        // Formato del mensaje con emojis y saltos de línea
        $whatsappMessage = "*Nombre:* " . urlencode($name) . "%0A" .
            "*Número de WhatsApp:* " . urlencode($whatsapp) . "%0A" .
            ($subject ? "*Asunto:* " . urlencode($subject) . "%0A" : '') .
            "*Mensaje:* " . urlencode($message) . "%0A%0A" .
            "¡Gracias por ponerte en contacto con nosotros! 😊%0A" .
            "Este mensaje fue enviado desde la sección de contacto.%0A" .
            "Visita nuestro sitio: (http://mercadoplus.digilysolutions.com)%0A" .
            "¡Esperamos tu mensaje!";

        // Crear la URL de WhatsApp
        $whatsappUrl = "https://wa.me/$whatsappNumber?text=" . $whatsappMessage;
        return  $whatsappUrl;
    }
        public function filterProducts(Request $request)
    {
        $data = $this->getProducts($request);
        $countryCurrencies = $data['countryCurrencies'];
        $currency = $data['currency'];
        $productsPaginator = $data['productsPaginator'];
        $categories = $data['categories'];
        $brands = $data['brands'];

        // Renderiza la vista parcial con los productos filtrados
        return view('app.partials.products',  compact('countryCurrencies', 'currency', 'productsPaginator', 'categories', 'brands'));
    }
    public function shop(Request $request)
    {

        $data = $this->getProducts($request);
        $countryCurrencies = $data['countryCurrencies'];
        $currency = $data['currency'];
        $productsPaginator = $data['productsPaginator'];
        $categories = $data['categories'];

        $brands = $data['brands'];
        return view('app.shop', compact('countryCurrencies', 'currency', 'productsPaginator', 'categories', 'brands'));
    }
    private function getProducts(Request $request)
    {
        $countryCurrencies = CountryCurrency::allActivated();
        $currency = $this->getCurrency();

        $categories = ProductCategory::allActivated();

        // Filtrar categorías para quedarte solo con las que tienen más de un producto
        $categories = $categories->filter(function ($category) {
            return count($category['products']) >= 1; // Suponiendo que tienes una relación "products"
        });

        $brands = Brand::with('products')
            ->whereHas('products')
            ->get();

        // Obtener productos filtrados
        $productsCollection = $this->getFilteredProducts($request);

        // Definir la cantidad de productos por página
        $perPage = 6;
        $currentPage = $request->input('page', 1);
        $paginatedProducts = $productsCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();

        return [
            'countryCurrencies' => $countryCurrencies,
            'currency' => $currency,
            'productsPaginator' => new \Illuminate\Pagination\LengthAwarePaginator(
                $paginatedProducts,
                $productsCollection->count(),
                $perPage,
                $currentPage,
                ['path' => $request->url(), 'query' => $request->query()]
            ),
            'categories' => $categories,
            'brands' => $brands,
        ];
    }

    public function productToCategory(Request $request)
    {
        if ($request->has('category_ids')) {

            return view('app.shop');
        }
    }
    public function getFilteredProducts(Request $request)
    {
        if (count($this->filterProducts) == 0 || empty($this->filterProducts)) {
            $products = Product::allActivated(); // Asegúrate de que este método devuelve una colección de productos.
            $this->filterProducts = collect($products);
        }

        // Filtrar productos según los criterios
        if ($request->has('color')) {
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($request) {
                return in_array($product->color, (array)$request->input('color'));
            });
        }

        if ($request->has('size')) {
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($request) {
                return in_array($product->size, (array)$request->input('size'));
            });
        }

        if ($request->has('price_min')) {
            $this->filterProducts = $this->filterProducts->where('price', '>=', $request->input('price_min'));
        }

        if ($request->has('price_max')) {
            $this->filterProducts = $this->filterProducts->where('price', '<=', $request->input('price_max'));
        }

        if ($request->has('name')) {
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($request) {
                return str_contains(strtolower($product->name), strtolower($request->input('name')));
            });
        }

        // Filtrado por ID de marcas
        if ($request->has('brand_ids')) {
            $brandIds = (array)$request->input('brand_ids');
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($brandIds) {
                return in_array($product->brand_id, $brandIds);
            });
        }

        // Filtrado por categoría
        if ($request->has('category_ids')) {
            $categoryIds = (array)$request->input('category_ids');
            $this->filterProducts = $this->filterProducts->filter(function ($product) use ($categoryIds) {
                return $product->categories()->whereIn('product_categories.id', $categoryIds)->exists();
            });
        }

        // Retornar los productos filtrados
        return $this->filterProducts;
    }


    public function productExchangeRateCart()
    {
        // Obtener el carrito de la sesión
        $cart = Session::get('cart', []); // Devuelve un array vacío si el carrito no existe

        // Verificar si el carrito no está vacío
        if (!empty($cart)) {
            // Obtener la moneda desde la sesión
            $currency = Session::get('currency');

            // Recorrer el carrito y actualizar cada producto
            foreach ($cart as &$product) {
                // Obtener el producto basado en su ID
                $productModel = Product::find($product['id']);

                // Verificar si el producto existe
                if ($productModel) {
                    // Obtener el producto con la tasa de cambio
                    $productWithExchangeRate = $this->productExchangeRate($currency, $productModel);

                    // Actualizar el producto en el carrito
                    $product = [
                        'id' => $productWithExchangeRate['id'],
                        'name' => $productWithExchangeRate['name'],
                        'outstanding_image' => $productWithExchangeRate['outstanding_image'],
                        'sale_price' => !empty($productWithExchangeRate['discounted_price'])
                            ? $productWithExchangeRate['discounted_price']
                            : $productWithExchangeRate['sale_price'],
                        'quantity' => $product['quantity'] // Se mantiene la cantidad original
                    ];
                } else {
                    // Opcional: Registra un aviso que indique que el producto no fue encontrado
                    Log::warning("Product with ID {$product['id']} not found.");
                }
            }

            // Actualizar el carrito en la sesión
            Session::put('cart', $cart);

            return $cart; // Devolver el carrito actualizado
        } else {
            // Si el carrito está vacío, se devuelve un array vacío
            return [];
        }
    }

    private function productExchangeRate($currency, $product)
    {
        $conversionData = $this->convertPrice($product, $currency);
        $product->sale_price = $conversionData['converted_price'];
        $product->discounted_price = $conversionData['converted_discount_price'];
        $product->code_currency_default = $conversionData['currency'];
        return $product;
    }

    public function convertPrices($products, $currency)
    {

        $exchangeRates =  json_decode($products[0]->categories[0]->exchange_rates, true);
        //return    json_decode($products[0]->categories[0]->exchange_rates, true);
        // return    $exchangeRates[ $products[0]->code_currency_default][$currency];
        return $products->map(function (Product $product) use ($currency) {
            $exchangeRates = json_decode($product->categories[0]->exchange_rates, true);
            // $exchangeRates = json_decode($product->categories->exchange_rates, true);
            $priceInOriginalCurrency = $product->sale_price;
            $discounted_priceInOriginalCurrency = $product->discounted_price;

            // Suponiendo que 'USD' es la moneda base para todos los productos
            if (isset($exchangeRates[$product->code_currency_default]) && isset($exchangeRates[$product->code_currency_default][$currency])) {
                $conversionRate = $exchangeRates[$product->code_currency_default][$currency];
                $convertedPrice = $priceInOriginalCurrency * $conversionRate;
                $convertedDiscounted_price = $discounted_priceInOriginalCurrency * $conversionRate;

                $product->sale_price = round($convertedPrice, 2);
                $product->discounted_price = round($convertedDiscounted_price, 2);
                return  $product;
            } else {
                $product->sale_price = $priceInOriginalCurrency; // Sin conversión si el tipo de cambio no existe
                $product->discounted_price = $discounted_priceInOriginalCurrency; // Sin conversión si el tipo de cambio no existe
            }
            return $product;
        });
    }
    public function convertPrice(Product $product, $currency)
    {
        $exchangeRates = json_decode($product->categories[0]->exchange_rates, true);
        if (isset($exchangeRates[$product->categories[0]->code_currency_default]) && isset($exchangeRates[$product->categories[0]->code_currency_default][$currency])) {
            $conversionRate = $exchangeRates[$product->categories[0]->code_currency_default][$currency];
            $convertedPrice = round($product->sale_price * $conversionRate, 2);
            $convertedDiscountPrice = round($product->discounted_price * $conversionRate, 2);
        } else {
            $convertedPrice = $product->sale_price;
            $convertedDiscountPrice = $product->discounted_price;
        }

        return [
            'converted_price' => $convertedPrice,
            'converted_discount_price' => $convertedDiscountPrice,
            'currency' => $currency,
        ];
    }


    public function productsExchangeRatesCurrency($currency)
    {
        // Obtener todos los productos activados
        $products = Product::allActivated();

        // Convertir el precio de cada producto a la moneda especificada
        $products = $products->map(function ($product) use ($currency) {
            return $this->productExchangeRate($currency, $product); // Asegúrate de que esto retorne el objeto Product con precio convertido.
        });

        // Devolver el array de productos con precios convertidos
        return [
            'products' => $products,
            'currency' => $currency
        ];
    }
    public function getProductExchangeRate(Request $request)
    {
        $data = [
            "products" => $request->products_id,
            "currency" => $request->currency
        ];

        $product = Product::where('id', $request->products_id)->first();
        if ($product) {
            // Increment the views only if the product exists
            $product->increment('views');
            $productWithExchangeRate = $this->productExchangeRate($request->currency, $product);
        }
        return $productWithExchangeRate;

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
        return [
            'products' => $productsCollection,
            'currency' => $data['currency']
        ];
    }
}
