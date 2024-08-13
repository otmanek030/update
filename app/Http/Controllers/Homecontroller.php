<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{


    public function admin_indx()
    {

        $products = Product::all();

        // Example calculations
        $totalOrders = $products->count(); // Assuming each product represents an order
        $totalSales = $products->sum('price'); // Total sales amount
        $totalProfit = $products->sum('profit'); // Assuming you have a profit field
        $totalReturn = $products->sum('returns'); // Assuming you have a returns field

        return view('admin.dashboard', compact('totalOrders', 'totalSales', 'totalProfit', 'totalReturn'));
    }
    public function user_indx()
    {

            return view('user.dashboardU');

    }






}
