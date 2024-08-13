<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
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

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function histories()
    {
        return $this->hasMany(PaymentHistory::class);
    }
}
