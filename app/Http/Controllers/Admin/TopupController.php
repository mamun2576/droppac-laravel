<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topup;
use App\Models\User;
use App\Actions\Admin\UpdateTopup;

class TopupController extends Controller
{
    public function index()
    {
        return view('topup.index');
    }


    public function edit(Topup $topup)
    {
        $user = User::where('id','=',$topup->user_id)->firstOr(function (){
            return back('status', 'User not found!');
        });
        return view('topup.edit',['topup'=>$topup, 'user'=>$user]);
    }



    public function update(Request $request, UpdateTopup $topupUpdater)
    {
        
       $topup = Topup::where('transaction_number','=',$request->transaction_number)->where('bank_account','=',$request->bank_account)->firstOr(function(){
           return back()->with('status','Topup not found!');
       });

       $user = User::where('id','=',$topup->user_id)->firstOr(function(){
            return back()->with('status','User not found');
       });

       if ($user != null && $request->status == 'processing') {
           $topupUpdater->update($topup, $request);
           return back()->with('status','Topup processing!');
       }

       if ($user != null && $request->status == 'approved') {
           $user->wallet_balance = $user->wallet_balance + $request->amount_to_be_added;
           $user->save();

           $topupUpdater->update($topup, $request);

           return back()->with('status','Topup completed succesfully!');
       }

       if ($user != null && $request->status == 'rollback') {
           $user->wallet_balance = $user->wallet_balance - $request->amount_to_be_added;
           $user->save();

           $topupUpdater->update($topup, $request);

           return back()->with('status','Topup reverted succesfully!');
       }

       if ($topup != null && $request->status == 'cancelled') {

           $topupUpdater->update($topup, $request);
           return back()->with('status','Topup request cancelled!');
       }       
    }
}





