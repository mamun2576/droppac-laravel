<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Package;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryBuilder;

class PackageListingTable extends Component
{
   
    public $packages;
    public $heading;
    public $statusCount = [];

    public function mount(){
        $this->packages = Package::with('updates')->orderBy('created_at', 'desc')->get();
        $this->updateStatusCount();
        $this->heading = 'Packages';
    }


    public function render()
    {
        return view('livewire.package-listing-table');
    }

    public function getPackagesByStatus($status){

        switch ($status) {
            case 'courier_requested':
                $this->heading = 'Courier Requests for Package Pickups';
                break;
            case 'picked_up':
                $this->heading = 'Picked Up Packages';
                break;
            case 'at_facility':
                $this->heading = 'Packages Currently At Our Facility';
                break;
            case 'in_transit':
                $this->heading = '12 Package are one the move';
                break; 
            case 'ready_for_delivery':
                $this->heading = '138 Packages Ready For Delivery';
                break;
            case 'out_for_delivery':
                $this->heading = '138 Packages Are Now Out For Delivery';
                break;  

            case 'delivered':
                $this->heading = '12 Packages Delivered This Week';
                break;        
            default:
                $this->heading = 'No packages as yet.';
                break;
        }
        
        $this->packages = Package::whereHas('updates', function(Builder $query)use($status){

            $query->where('status',$status)->whereIn('id', function($query){
                $query->selectRaw('max(id)')->from('updates')->whereColumn('package_id','packages.id');
            });
        })->get();
    }


    public function domestic()
    {
        $this->packages = Package::with('updates')->where('uuid','=',null)->orderBy('created_at', 'desc')->get();
        $this->updateStatusCount();
        $this->heading = 'Packages Shipped Locally';
   
    }

    public function international()
    {
        $this->packages = Package::with('updates')->where('uuid','!=',null)->orderBy('created_at', 'desc')->get();
        $this->updateStatusCount();
        $this->heading = 'Packages Shipped Locally';
   
    }


    public function updateStatusCount()
    {
        $this->statusCount= [
                    'courier_requested' => 0,
                    'picked_up'         => 0,
                    'at_facility'       => 0,
                    'in_transit'        => 0,
                    'ready_for_delivery'=> 0,
                    'out_for_delivery'  => 0,
                    'delivered'         => 0,
                     ];
        foreach($this->packages as $pack)
        {
            $this->statusCount[$pack->latestUpdate->status]++; 
        }
    }
}
