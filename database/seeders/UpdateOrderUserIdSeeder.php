<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class UpdateOrderUserIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all orders
        $orders = Order::all();

        foreach ($orders as $order) {
            // Find user by email or name
            $user = User::where('email', $order->email)
                         ->orWhere('name', $order->name)
                         ->first();

            if ($user) {
                // Update the order with the correct user_id
                $order->user_id = $user->id;
                $order->save();
            }
        }
    }
}
