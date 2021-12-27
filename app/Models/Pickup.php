<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    protected $casts = [
        'recipient' => 'array',
        'pickup_address' => 'array',
        'delivery_address' => 'array',
        'packages' => 'array',
        'handling' => 'array',
        'delivery_expected_on' => 'datetime',
    ];

     protected $fillable = [
        'user_id',
        'service_id',
        'recipient',
        'pickup_address',
        'delivery_address',
        'packages',
        'handling',
        'delivery_expected_on',
        'declared_value',
        'service'
    ];

    public function setPickupAddressAttribute($value)
    {
        $this->attributes['pickup_address'] = json_encode($value);
    }

     public function setDeliveryAddressAttribute($value)
    {
        $this->attributes['delivery_address'] = json_encode($value);
    }
}
