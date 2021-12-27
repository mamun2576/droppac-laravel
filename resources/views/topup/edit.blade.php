<x-app-layout>
    <div class="text-sm font-medium flex flex-col justify-left">
        <h1 class=" text-xl font-bold text-gray-600">Updating Wallet</h1>
        <x-jet-section-border />
        <div class="flex flex-col sm:flex-row my-6 text-lg font-bold text-gray-600"> 
            <div class="mr-8">
                <h4 class="text-lg text-gray-700 font-medium">Update Topup Request for {{$user->first_name.' '.$user->last_name}}</h4>
                <p class="text-xs font-normal text-gray-400"> 
                    or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
                </p> 
            </div>
        </div> 
        <form action="/admin/topup/update" method="POST">
            @csrf
            @method('PATCH')
            <div class=" flex flex-col sm:flex-row w-full inline justify-left  mb-6"> 
                <!-- Ammount to be added -->
                <div class="w-full flex flex-col sm:flex-row sm:space-x-8">
                    <!-- Current Balance -->
                    <div class="w-full">
                        <x-jet-label for="current_balance" value="{{ __('Current Balance') }}" />
                        <h3 class="text-lg font-medium  p-2 bg-blue-100 rounded-md">{{$user->wallet_balance}}</h3>
                    </div>
                    <div class="w-full">
                        <x-jet-label for="amount_to_be_added" value="{{ __('Amount to be added') }}" />
                        <x-jet-input name="amount_to_be_added" type="number" class="mt-1 block w-full" value="{{$topup->amount_to_be_added}}" autocomplete="amount_to_be_added" />
                        <x-jet-input-error for="amount_to_be_added" class="mt-2" />    
                    </div>
                </div>
            </div>
            <div class=" flex flex-col sm:flex-row w-full inline justify-left sm:space-x-8">
                 <!-- Transaction Number -->
                <div class="w-full">
                    <x-jet-label for="transaction_number" value="{{ __('Transaction Number') }}" />
                    <x-jet-input  name="transaction_number" type="text" class="mt-1 block w-full" value="{{$topup->transaction_number}}" />
                    <x-jet-input-error for="transaction_number" class="mt-2" />
                </div>
                <!-- Date of Transaction -->
                <div class="w-full">
                    <x-jet-label for="date_of_transaction" value="{{ __('Date of the transaction') }}" />
                    <x-jet-input name="date_of_transaction" type="text" readonly class="mt-1 block w-full" value="{{$topup->date_of_transaction}}" autocomplete="date_of_transaction" />
                    <x-jet-input-error for="date_of_transaction" class="mt-2" />
                </div>
                <!-- Bank -->
                <div class="w-full">
                    <x-jet-label for="bank_account" value="{{ __('Receiving Bank Account') }}"/>
                    <select name="bank_account" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="" selected > Select receiving bank account</option>

                        <option value="scotia_account" @if(@$topup->bank_account == 'scotia_account') selected @endif >BNS Account Ending 1777</option>
                        <option value="ncb_account" @if(@$topup->bank_account == 'ncb_account') selected @endif>NCB Account Ending 8031</option>
                        <option value="jn_account" @if(@$topup->bank_account == 'jn_account') selected @endif>JN Account Ending 8031</option>
                    </select>
                    <x-jet-input-error for="bank_account" class="mt-2" />
                </div>
            </div>
            <!-- Status -->
            <div class="w-full">
                <x-jet-label for="status" value="{{ __('Status') }}"/>
                <select name="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"  autocomplete="status">
                    <option value="" selected >Select a Status</option>

                    <option value="approved" @if(@$topup->status == 'approved') selected @endif >Approved</option>
                    <option value="processing" @if(@$topup->status == 'processing') selected @endif>Processing</option>
                    <option value="cancelled" @if(@$topup->status == 'cancelled') selected @endif>Cancelled</option>
                    <option value="rollback" @if(@$topup->status == 'rollback') selected @endif>Rollback</option>
                </select>
                <x-jet-input-error for="status" class="mt-2" />
            </div>
            <x-jet-button class="">
                {{ __('Update Wallet') }}
            </x-jet-button>  
        </form>
    </div>
</x-app-layout>