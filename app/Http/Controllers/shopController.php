<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class shopController extends Controller
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
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:15',
        'total_price' => 'required|numeric',
        'products' => 'required', // This will be a JSON string of products
    ]);

    // Create the order
    $order = Order::create([
        'name' => $request->input('name'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'total_price' => $validatedData['total_price'],
    ]);

    // Decode the products JSON string
    $products = json_decode($validatedData['products'], true);

    // Save each product into the order_products table
    foreach ($products as $product) {
        if ($product['quantity'] > 0) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
        }
    }

    return redirect()->back()->with('success', 'Order placed successfully!');
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
