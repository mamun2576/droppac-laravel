<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class Package extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account',
        'status',
        'user_id',
        'tracking_number',
        'ground_tracking',
        'shipper',
        'description',
        'consignee',
        'weight',
        'height',
        'length',
        'width' ,
        'waybill',
        'courier',
        'declared_value',
        'uuid',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    //protected $with = ['updates'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Get the shipment for the package.
     */
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    /**
     * Get the user for the package.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the updates for the package.
     */
    public function updates()
    {
        return $this->hasMany(Update::class);
    }

    /**
     * Get the latest update for the package.
     */
    public function latestUpdate()
    {
        return $this->hasOne(Update::class)->latestOfMany();
    }


    /**
     * Get a package with updates by id or fail with status
     */
    public function findPackageWithUpdatesOrFail($id)
    {
        $package = Package::with('updates')->where('id',$id)->firstOr(function(){
            return null;
        });

        if($package == null){

            return back()->with('status', 'Sorry that package was not found!');
        }

        return $package;
    } 

}
