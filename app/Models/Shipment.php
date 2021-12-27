<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;
use App\Models\Update;
use App\Models\User;

class Shipment extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'number',
        'recipient',
        'services',
        'departs_on',
        'arrives_on',
        'carrier',
        'origin',
        'destination',
        'carrier',
        'vessel_number',
        'freight_type',
        'status',
        'uuid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'departed_at' => 'date',
        'arrived_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the updates for the shipment.
     */
    public function packages()
    {
        return $this->hasMany(Packages::class);
    }

    /**
     * Get the updates for the shipment.
     */
    public function updates()
    {
        return $this->hasMany(Update::class);
    }

    /**
     * Get the latest update for the shipment.
     */
    public function latestUpdate()
    {
        return $this->hasOne(Update::class)->latestOfMany();
    }
}
