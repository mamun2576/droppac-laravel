<?php

namespace App\Actions\Admin;

use App\Models\User;
use App\Models\Update;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Events\PackageStatusUpdated;

class CreateNewPackage 
{


    /**
     * Validate a new package.
     *
     * @param  array  $input
     * @return \App\Models\Packade
     */
    public function create(array $input, User $user)
    {
        Validator::make($input,[
            'status' => 'required|string|max:255',
            'account' => 'required|string|max:255',
            'tracking_number' => 'nullable|string|max:255',
            'shipper' => 'nullable|string|max:255',
            'description' =>'nullable|string|max:255',
            'consignee' => 'nullable|string|max:255',
            'weight' => 'numeric|required|max:1000',
            'height' => 'nullable|numeric|max:255',
            'length' => 'nullable|numeric|max:255',
            'width' =>  'nullable|numeric|max:255',
            'waybill' => 'nullable|string|max:255',
            'courier' => 'nullable|string|max:255',
            'declared_value' => 'nullable|numeric',
            'uuid' => 'nullable|string|max:255|unique:packages',
        ])->validate();

        DB::transaction(function() 
            use ($input,$user) {
                  
            return $package   = tap(Package::create([
            'user_id'         => $user->id,
            'account'         => $input['account'],
            'tracking_number' => $input['tracking_number'],
            'ground_tracking' => strtoupper(uniqid('LJ').uniqid('z')),
            'shipper'         => $input['shipper'],
            'description'     => $input['description'],
            'consignee'       => $input['consignee'],
            'weight'          => $input['weight'],
            'height'          => $input['height'],
            'length'          => $input['length'],
            'width'           => $input['width'],
            'waybill'         => $input['waybill'],
            'courier'         => $input['courier'],
            'declared_value'  => $input['declared_value'],
            'uuid'            => $input['uuid']]), 
            function(Package $package) use ($input){
                $update = Update::create(['status'=> $input['status'],
                                'package_id' => $package->id,
                                'location'   => 'KGN',
                                'updated_at' => $package->created_at,
                            ]);
                event(new PackageStatusUpdated($update)); 
            });
        },2);
    }

}
