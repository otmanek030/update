<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    // Show the form and products
    public function index()
    {
        $products = Product::all(); // Retrieve all products
        $selectedProducts = session('selected_products', []); // Get selected products from session
        $totalPrice = array_sum(array_column($selectedProducts, 'price')); // Calculate the total price
        return view('user/shop', compact('products', 'selectedProducts', 'totalPrice'));
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

