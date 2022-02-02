<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceCollection;
use App\Http\Resources\DeviceResource;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        return new DeviceCollection($devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'origin' => 'required|string|max:100',
            'company_id' => 'required',
            'type_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $device = Device::create([
            'model' => $request->model,
            'description' => $request->description,
            'origin' => $request->origin,
            'company_id' => $request->company_id,
            'type_id' => $request->type_id,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['Post is created successfully.', new DeviceResource($device)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return new DeviceResource($device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'origin' => 'required|string|max:100',
            'company_id' => 'required',
            'type_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $device->model = $request->model;
        $device->description = $request->description;
        $device->origin = $request->origin;
        $device->company_id = $request->company_id;
        $device->type_id = $request->type_id;

        $device->save();

        return response()->json(['Post is updated successfully.', new DeviceResource($device)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return response()->json('Device is deleted successfully!');
    }
}
