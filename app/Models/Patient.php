<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'facebook_name',
        'package',
        'phone_number',
        'date_of_next_visit',
        'address'
    ];
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function getFirstNameAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    public function getLastNameAttribute($value)
    {
        return ucwords(strtolower($value));
    }
    public function getGenderAttribute($value)
    {
        return ucwords(strtolower($value));
    }
    public function getFacebookNameAttribute($value)
    {
        return ucwords(strtolower($value));
    }
    public function getAddressAttribute($value)
    {
        return ucwords(strtolower($value));
    }
    
}
