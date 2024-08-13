<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'tooth_number', 
        'dentist', 
        'procedure', 
        'charge', 
        'paid', 
        'balance_remaining', 
        'remarks', 
        'signature', 
        'payment_date'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
