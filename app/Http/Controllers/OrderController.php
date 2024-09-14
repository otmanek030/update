<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Eager load the user and products relationships
        $orders = Order::with('user', 'products')->get();
        return view('admin.orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|json',
            'total_price' => 'required|numeric',
        ]);

        $products = json_decode($request->input('products'), true);

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $request->input('total_price'),
        ]);

        foreach ($products as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
        }

        return redirect()->back()->with('success', 'Order placed successfully!');
    }
}
