<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AmericaAddress extends Component
{
    
    public $seamail = [];

    public function mount()
    {
        $this->seamail = ['name'     => 'Drop  Pac Logistics',
                          'line1'    => '3748 W Oakland Park Blvd MD29258',
                          'line2'    => Auth::user()->account,
                          'city'     => 'Lauderdale Lakes',
                          'state'    => 'Florida',
                          'zipcode' => '33311',
                          'country'  => 'United States',
                        ];      
    }

    public function render()
    {
        return view('livewire.america-address');
    }
}
