<?php

namespace App\Actions\Shipment;

use App\Models\User;
use App\Models\Update;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Events\PackageStatusUpdated;

class CreateNewShipment
{

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $request->validate([
            'number'        => 'required|string|max:255|unique:shipments',
            'departs_on'    => 'required|string|max:255',
            'arrives_on'    => 'required|string|max:255',
            'origin'        => 'required|max:255',
            'destination'   => 'required|string|max:255',
            'carrier'       => 'required|string|max:255',
            'vessel_number' => 'required|string|max:255',
            'status'        => 'required|string|max:255',
            'freight_type'  => 'required|string|max:255',
            'uuid'          => 'required|string|max:255|unique:shipments',
        ]);

        $shipment = Shipment::create([
            'user_id'       => Auth::user()->id,
            'number'        => $request->number,
            'packages'      => $request->packages,
            'services'      => $request->services,
            'departs_on'    => $request->departs_on,
            'arrives_on'    => $request->arrives_on,
            'origin'        => $request->origin,
            'destination'   => $request->destination,
            'carrier'       => $request->carrier,
            'vessel_number' => $request->vessel_number,
            'status'        => $request->status,
            'freight_type'  => $request->freight_type,
            'uuid'          => $request->uuid,
        ]);
        //event(new ShipmentCreated($shipment));
    }

}
