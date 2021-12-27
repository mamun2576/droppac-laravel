<?php

namespace App\Http\Livewire\Pickup;

use Livewire\Component;

class DropoffSection extends Component
{
    public $place = 'residence';
    public $note;
    public $dropoff_address = [];

    public function mount()
    {
       $this->dropoff_address = ['place'=>'','business_name'=>'','address' =>'','community'=>'', 'parish' =>'','knutsford_office'=>'','knutsford_receipt_number' =>'', 'knutsford_paid'=>false]; 
    }

    public function setPlace($value)
    {
        switch ($value) {
            case 'business':
                $this->place = 'business';
                break;
            case 'knutsford':
                $this->place = 'knutsford';
                break;
            
            default:
                $this->place = 'residence';
                break;
        }
        $this->emit('change-content');
    }

    public function setDropoffAddress()
    {
       
        $this->dropoff_address['place'] = $this->place;
        $this->emit('set-dropoff-address',$this->dropoff_address);
    }     

    public function render()
    {
        return view('livewire.pickup.dropoff-section');
    }
}
