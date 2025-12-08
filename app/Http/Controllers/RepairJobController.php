<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RepairJob;
use App\Models\Device;

class RepairJobController extends Controller
{
    public function create(Request $request) {
        $devices = Device::all()->toArray();
        return view('repair_form', ["devices" => $devices, "statusArray" => $this->statusArray]);
    }
    
    public function store(Request $request){

        // dd($request->all());
        Customer::create([
            'name' => $request->customer_name,
            'phone' => $request->customer_phone,
            'email' => $request->customer_email,
            'address' => $request->customer_address,
        ]);
        
        RepairJob::create([
            'ro_number' => $request->ro_number,
            'device_id' => $request->device_id,
            'received_date' => $request->received_date,
            'issue_description' => $request->issue_description,
            'diagnostics' => $request->diagnostics,
            'status' => $request->status,
            'estimated_cost' => $request->estimated_cost,
            'final_cost' => $request->final_cost,
            'delivery_date' => $request->delivery_date,
            'note' => $request->note,
            
        ]);

        return redirect()->route('devices.index');
        
    }
}