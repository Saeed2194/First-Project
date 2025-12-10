<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepairJob;  
use App\Models\Device;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date',
        ]);

        $reports = RepairJob::with('device')
            ->whereBetween('received_date', [$request->start_date, $request->end_date])
            ->get();

        $totalAmount = $reports->sum('final_cost');

        return view('reports.index', compact('reports', 'totalAmount'));
    }
}