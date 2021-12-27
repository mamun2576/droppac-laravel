<?php

namespace App\Actions\Wallet;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateWalletBalance
{
    /**
     * Validate a new topup request.
     *
     * @param  $user, $request
     * @return \App\Models\Topup
     */
    public function create(User $user Request $request)
    {
            $request->validate([
            'amount_to_be_added' => 'required|numberic|max:1000000',
            'transaction_number' => 'required|string|max:255',
            'bank_account' => 'required|string|max:255',
            'date_of_transaction' => 'required|date|max:255',
            'status'=>'required|string|max:255',
        ]);


        Topup::save([
            'user_id' => $user->id,
            'amount_to_be_added' => $request->amount_to_be_added,
            'transaction_number' => $request->transaction_number,
            'bank_account' => $request->bank_account,
            'date_of_transaction' => $request->date_of_transaction,
            'status' => $request->status,
        ]);
    }

}
