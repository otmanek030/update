<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function destroy($id)
{
    $service = Service::find($id);
    if ($service) {
        $service->delete();
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false], 404);
}

public function update(Request $request, $id)
{
    $service = Service::find($id);
    if ($service) {
        $service->description = $request->input('description');
        $service->save();
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false], 404);
}


}
