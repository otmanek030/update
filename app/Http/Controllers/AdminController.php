<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->description = $request->input('description');
            $service->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    // app/Http/Controllers/AdminController.php

    public function storeService(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);




        $imagePath = $request->file('image')->store('images', 'public');

        $service = new Service();
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->image = $imagePath;
        $service->save();


        return redirect()->route('admin.services.index')->with('success', 'Service added successfully!');
    }

}
