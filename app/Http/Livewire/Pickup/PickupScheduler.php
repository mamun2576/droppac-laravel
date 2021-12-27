<?php

namespace App\Http\Livewire\Pickup;

use Livewire\Component;
use App\Models\Pickup;

class PickupScheduler extends Component
{
    public $pickup;
    public $heading;
    public $note;
    public $tab = 'pickup';

    protected $listeners = ['change-tab' => 'setTab', 'set-pickup-address'=>'setPickupAddress', 'set-dropoff-address'=>'setDropoffAddress','change-content' => 'render'];

    public function mount()
    {
      $this->pickup = new Pickup;
    }

    public function setTab($value)
    {
        switch ($value) {
            case 'pickup':
                $this->tab = 'pickup';
                break;
            case 'dropoff':
                $this->tab = 'dropoff';
                break;
            
            default:
                $this->tab = 'recipient';
                break;
        }
        //$this->emit('change-content');
    }

    public function setPickupAddress($pickup_address)
    {
        
        //$this->pickup = ['']
        $this->pickup->pickup_address = $pickup_address;
        $this->setTab('dropoff');
       // dd($this->pickup);
    }

    public function setDropoffAddress($dropoff_address)
    {
        $this->pickup->delivery_address = $dropoff_address ;
        //$this->setTab('dropoff');
        dd($this->pickup);
    }

    public function render()
    {
        
        
        return view('livewire.pickup.pickup-scheduler');
    }
}
