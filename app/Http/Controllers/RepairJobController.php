<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\RepairJob;
use App\Models\Device;

class RepairJobController extends Controller
{
    public function index()
    {
        $repairs = RepairJob::all();
        return view('repairs.index', compact('repairs'));
    }

    public function create(Request $request) {
        $devices = Device::all()->toArray();
        return view('repairs.create', ["devices" => $devices, "statusArray" => $this->statusArray]);
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

    public function edit(string $id)
    {
        $repair = RepairJob::with('customer')->findOrFail($id);
        // $repair = RepairJob::findorFail($id);
        $devices = Device::all();
        
        $statusArray = [
        'pending' => 'Pending',
        'in_progress' => 'In Progress',
        'completed' => 'Completed',
        ];
    
        return view('repairs.edit' , compact('repair', 'devices', 'statusArray'));
    }

    public function update(Request $request, $id)
    {
        $repair = RepairJob::findOrFail($id);    

        $repair->update([
            'final_cost' => $request->final_cost,
            'status' => $request->status,
            'issue_description' => $request->issue_description,
            'note' => $request->note,
        ]);

        return redirect()->route('repair.index')->with('success', 'Repair updated successfully');
    }

}