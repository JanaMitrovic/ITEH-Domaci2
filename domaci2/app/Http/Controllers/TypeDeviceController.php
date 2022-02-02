<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class TypeDeviceController extends Controller
{
    public function index($type_id)
    {
        $devices = Device::get()->where('type_id', $type_id);
        if (is_null($devices))
            return response()->json('Data not found!', 404);
        return response()->json($devices);
    }
}
