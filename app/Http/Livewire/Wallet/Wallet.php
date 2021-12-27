<?php

namespace App\Http\Livewire\Wallet;

use Livewire\Component;
use App\Models\Topup;
use Illuminate\Support\Facades\Auth;

class Wallet extends Component
{
    public $amount_to_be_added;
    public $transaction_number;
    public $bank_account;
    public $date_of_transaction;
    public $status;
    public $state = [];
    public $topups;
    public $heading = 'Topups Requested';
    protected $listeners = ['refresh-topups'=>'$refresh'];



    protected $rules = [
            'amount_to_be_added' => 'required|numeric',
            'transaction_number' => 'required|string|max:255|unique:topups',
            'bank_account' => 'required|string|max:255',
            'date_of_transaction' => 'required|date|max:255',
            'status'=>'nullable|string|max:255',
    ];

    public function mount()
    {
        $this->state  = Auth::user()->withoutRelations()->toArray();
        $this->topups = Topup::where('user_id','=',$this->state['id'])->orderBy('updated_at','desc')->get();
    }

    public function requestTopup()
    {
        $this->validate();
        Topup::create([
                'user_id' => $this->state['id'],
                'amount_to_be_added' => $this->amount_to_be_added,
                'transaction_number' => $this->transaction_number,
                'bank_account' => $this->bank_account,
                'date_of_transaction' => $this->date_of_transaction,
                'status' => 'processing'
            ]);
        $this->emit('refresh-topups');
    }

    public function render()
    {
        return view('livewire.wallet.wallet',['topups' => $this->topups]);
    }
}
