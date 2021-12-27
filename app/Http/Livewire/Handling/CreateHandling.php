<?php

namespace App\Http\Livewire\Handling;

use Livewire\Component;
use App\Models\Handling;

class CreateHandling extends Component
{
    
    public $name;
    public $cost;
    public $note;
    public $handlings;

    protected $rules = ['name'=>'required|string|min:5|unique:services',
                        'cost' => 'required|numeric|min:100',
                        'note' => 'required|string|max:50'];

    public function mount()
    {
        $this->handlings = Handling::orderBy('created_at','desc')->get();
    }

    public function createHandling()
    {
        $this->validate($this->rules);
        Handling::create(['name' => $this->name,
                         'cost' => $this->cost,
                         'note' => $this->note]);
    }

    public function render()
    {
        return view('livewire.handling.create-handling', ['handlings'=>$this->handlings]);
    }
}
