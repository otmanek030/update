<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Show the form and products
    public function index()
    {
        $products = Product::all(); // Retrieve all products
        $selectedProducts = session('selected_products', []); // Get selected products from session
        $totalPrice = array_sum(array_column($selectedProducts, 'price')); // Calculate the total price
        return view('user.shop', compact('products', 'selectedProducts', 'totalPrice'));
    }

    public function store(Request $request)
{
    $request->validate([
        'products' => 'required|array',
        'total_price' => 'required|numeric',
    ]);

    \Log::info('Request Data:', $request->all()); // Log request data

    $order = Order::create([
        'user_id' => auth()->id(),
        'total_price' => $request->input('total_price'),
    ]);

    $products = json_decode($request->input('products'), true);
    \Log::info('Decoded Products:', $products); // Log decoded products

    foreach ($products as $product) {
        $price = (float) $product['price'];
        $quantity = (int) $product['quantity'];

        $order->products()->create([
            'product_id' => $product['id'],
            'quantity' => $quantity,
            'price' => $price,
        ]);
    }

    session()->forget('selected_products');

    return redirect()->route('shop.index')->with('success', 'Order placed successfully!');
}
    


    // Handle product selection
    public function select(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $selectedProducts = session('selected_products', []);
            $selectedProducts[$id] = $product;
            session(['selected_products' => $selectedProducts]);
        }
        return redirect()->route('shop.index');
    }
}
