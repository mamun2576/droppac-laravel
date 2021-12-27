<?php

namespace App\Actions\Admin;

use App\Models\User;
use App\Models\Topup;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UpdateTopup
{

 public function update(Topup $topup, Request $request)
    {
            $request->validate([
            'amount_to_be_added' => 'required|numeric|max:1000000',
            'transaction_number' => 'required|string|max:255',
            'bank_account' => 'required|string|max:255',
            'date_of_transaction' => 'required|date|max:255',
            'status'=>'required|string|max:255',
        ]);


        $topup->forceFill([
            'amount_to_be_added' => $request->amount_to_be_added,
            'transaction_number' => $request->transaction_number,
            'bank_account' => $request->bank_account,
            'date_of_transaction' => $request->date_of_transaction,
            'status' => $request->status,
        ])->save();
    }
}
