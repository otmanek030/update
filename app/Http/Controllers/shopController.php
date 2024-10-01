<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class shopController extends Controller
{
    // Show the form and products
    public function index()
    {
        $products = Product::all(); // Retrieve all products
        $selectedProducts = session('selected_products', []); // Get selected products from session
        $totalPrice = array_sum(array_column($selectedProducts, 'price')); // Calculate the total price

        // Get the authenticated user's information
        $user = Auth::user();

        return view('user.shop', compact('products', 'selectedProducts', 'totalPrice', 'user'));
    }

    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'total_price' => 'required|numeric',
        'products' => 'required', // This will be a JSON string of products
    ]);

    // Get the authenticated user
    $user = Auth::user();

    // Create the order and associate it with the user
    $order = Order::create([
        'name' => $validatedData['name'],
        'phone' => $validatedData['phone'],
        'email' => $validatedData['email'],
        'total_price' => $validatedData['total_price'],
        'user_id' => $user->id, // Set the user_id here
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
            session(key: ['selected_products' => $selectedProducts]);


        }
        $request->session()->put('selected_products', $selectedProducts);
        return redirect()->route('shop.index');
    }

    public function selectedProducts(Request $request)
{
    // Get the authenticated user
    $user = Auth::user();

    // Fetch the user's orders along with the products
    $orders = Order::with('orderProducts.product') // Assuming your Order model has a relationship with OrderProduct
                   ->where('user_id', $user->id) // Filter orders by the authenticated user
                   ->get();

    return view('user.selected-products', compact('orders'));
}


}
