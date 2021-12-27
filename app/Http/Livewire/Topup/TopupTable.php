<?php

namespace App\Http\Livewire\Topup;

use Livewire\Component;
use App\Models\Topup;

class TopupTable extends Component
{
    public $topups;
    public $heading = 'Requests for Wallet Topups';
    protected $listeners = ['refresh-topup-table'=>'$refresh'];

    public function mount()
    {
       $this->topups = Topup::orderBy('created_at','desc')->get();

    }

    public function approveTopup(Topup $topup)
    {
        $topup->status = 'approved';
        $topup->user->wallet_balance = $topup->user->wallet_balance + $topup->amount_to_be_added;
        $topup->amount_to_be_added = 0;
        $topup->user->save();
        $topup->save();
        $this->emit('refresh-topup-table');
    }

    public function render()
    {
        return view('livewire.topup.topup-table');
    }
}
