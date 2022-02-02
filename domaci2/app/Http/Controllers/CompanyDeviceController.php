<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class CompanyDeviceController extends Controller
{
    public function index($company_id)
    {
        $devices = Device::get()->where('company_id', $company_id);
        if (is_null($devices))
            return response()->json('Data not found!', 404);
        return response()->json($devices);
    }
}
