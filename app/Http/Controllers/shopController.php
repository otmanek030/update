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
        // Decode the JSON products string into an array
        $products = json_decode($request->input('products'), true);

        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'total_price' => 'required|numeric',
            'products' => 'required',
        ]);

        // Retrieve user information and total price from the request
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $totalPrice = $request->input('total_price');

        // Create a new order with user information
        $order = Order::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'total_price' => $totalPrice,
        ]);

        

        // Insert each product into the order_items table
        foreach ($products as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
            ]);
        }

        // Redirect or respond to the user
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
