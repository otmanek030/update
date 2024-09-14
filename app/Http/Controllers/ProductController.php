<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    // Store a new product
    public function store(Request $request)
{
    $request->validate([
        'pro_name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'price' => 'required|string|max:50',
        'type' => 'required|string|max:255', // Validate type
    ]);

    $file = $request->file('image');
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/products', $fileName);

    Product::create([
        'name' => $request->input('pro_name'),
        'photo' => $fileName,
        'price' => $request->input('price'),
        'type' => $request->input('type'), // Save type
    ]);

    return redirect()->route('product.index');
}

public function update(Request $request, $id)
{
    $request->validate([
        'pro_name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'price' => 'required|string|max:50',
        'type' => 'required|string|max:255', // Validate type
    ]);

    $product = Product::findOrFail($id);
    $product->name = $request->input('pro_name');

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/products', $fileName);
        $product->photo = $fileName;
    }
    $product->price = $request->input('price');
    $product->type = $request->input('type'); // Update type

    $product->save();

    return redirect()->route('product.index');
}


    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit_product', compact('product'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.show', compact('product'));
    }

}
