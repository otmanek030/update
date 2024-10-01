<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\User;

class UpdateOrderUserId extends Command
{
    protected $signature = 'orders:update-user-id';
    protected $description = 'Update user_id in orders table based on email and name';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
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

        $this->info('Orders updated successfully.');
    }
}
