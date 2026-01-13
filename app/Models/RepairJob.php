<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'ro_number', 'device_id', 'received_date', 'issue_description',
        'diagnostics', 'status', 'estimated_cost', 'final_cost',
        'delivery_date', 'note'  
    ];

    public $timestamps = false;

  
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
}