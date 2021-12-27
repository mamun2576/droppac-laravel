<?php

namespace App\Actions\Admin;

use App\Models\User;
use App\Models\Update;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Events\PackageStatusUpdated;

class UpdatePackageStatus 
{


    /**
     * Validate a new package.
     *
     * @param  array  $input
     * @return \App\Models\Packade
     */
    public function update(Package $package, array $input)
    {
        Validator::make($input,[
            'status' => 'required|string|max:255',
            'account' => 'required|string|max:255',
            'tracking_number' => 'nullable|string|max:255',
            'ground_tracking' => 'required|string|max:255',Rule::unique('packages')->ignore($package->id),
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
        ])->validate();

        $this->updatePackage($package,$input);            
    }


    public function updatePackage(Package $package, array $input){

      return  DB::transaction(function() use ($input,$package) {
            return $package   = tap($package->forceFill([
            'user_id'         => $package->user_id, 
            'account'         => $input['account'],
            'tracking_number' => $input['tracking_number'],
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
            ])->save(), 
            function() use ($input,$package){
                if ($package->latestUpdate->status !== $input['status']) {
                 $update  = Update::create(['status'=> $input['status'],
                    'package_id' => $package->id,
                    'location'   => 'KGN',
                    'updated_at' => $package->updated_at,
                    ]); 
                    event(new PackageStatusUpdated($update));  
                }
                
            });
        },2); 
    }
}
