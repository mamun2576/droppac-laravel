<?php

namespace App\Http\Livewire\Pickup;

use Livewire\Component;

class PickupSection extends Component
{
    public $place = 'residence';
    public $note;
    public $pickup;
    public $pickup_address = [];

    public function mount($pickup)
    {
       $this->pickup_address = ['place'=>'','business_name'=>'','address' =>'','community'=>'', 'parish' =>'','knutsford_office'=>'','knutsford_receipt_number' =>'', 'knutsford_paid'=>false]; 
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

    public function setPickupAddress()
    {
       
        $this->pickup_address['place'] = $this->place;
        $this->emit('set-pickup-address',$this->pickup_address);
    }    

    public function render()
    {
        return view('livewire.pickup.pickup-section');
    }
}
