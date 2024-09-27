<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
            'name' => $product['name'], // Include the product name here
        ]);
    }

    return redirect()->back()->with('success', 'Order placed successfully!');
}

public function confirmOrder($id)
{
    $order = Order::findOrFail($id);

    // Process the order confirmation, e.g., update status, etc.
    $order->status = 'confirmed';
    $order->save();

    // Send confirmation email
    if ($order->email) {
        Mail::to($order->email)->send(new OrderConfirmationMail($order));
    }

    // // Check for email failures
    // if (Mail::failures()) {
    //     return redirect()->back()->withErrors('Failed to send confirmation email.');
    // }

    return redirect()->back()->with('success', 'Order confirmed and email sent successfully.');
}


}
