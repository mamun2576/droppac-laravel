<?php

namespace App\Http\Livewire\Service;

use Livewire\Component;
use App\Models\Service;

class CreateService extends Component
{
    public $name;
    public $cost;
    public $delivery_time;
    public $services;
    protected $rules = ['name'=>'required|string|min:5|unique:services',
                        'cost' => 'required|numeric|min:350',
                        'delivery_time' => 'required|integer|min:1|max:72'];
    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->services = Service::orderBy('created_at','desc')->get();
    }
    public function render()
    {
        return view('livewire.service.create-service', ['services' => $this->services]);
    }

    public function createService()
    {
        $this->validate($this->rules);
        Service::create(['name' => $this->name,
                         'cost' => $this->cost,
                         'delivery_time' => $this->delivery_time]);
        $this->emit('refresh');
    }

}
