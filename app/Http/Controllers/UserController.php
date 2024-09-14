<?php 
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function serviceClient()
    {
        $services = Service::all();
        return view('user.serviceClient', compact('services'));
    }
}
