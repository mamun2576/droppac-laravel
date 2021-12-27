<?php

namespace App\Http\Livewire\Pickup;

use Livewire\Component;

class SchedulerTabContent extends Component
{
    protected $listeners = ['change-content' => '$refresh'];


    public function render()
    {
        return view('livewire.pickup.scheduler-tab-content');
    }
}
