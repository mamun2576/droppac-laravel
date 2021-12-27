<div class="text-sm font-medium flex flex-col justify-left">
    <h1 class=" text-xl font-bold text-gray-600">Wallet</h1>
     <x-jet-section-border />
    <div class="flex flex-col sm:flex-row my-6 text-lg font-bold text-gray-600"> 
        <div class="mr-8">
            <h4 class="text-lg text-gray-700 font-medium">Topup Now</h4>
            <p class="text-xs font-normal text-gray-400"> 
                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
            </p> 
        </div>
    </div> 
    <form wire:submit.prevent="requestTopup">
        <div class=" flex flex-col sm:flex-row w-full inline justify-left  mb-6"> 
            <!-- Ammount to be added -->
            <div class="w-full flex flex-col sm:flex-row sm:space-x-8">
                <!-- Current Balance -->
                <div class="w-full">
                    <x-jet-label for="current_balance" value="{{ __('Current Balance') }}" />
                    <h3 class="text-lg font-medium  p-2 bg-blue-100 rounded-md">{{$state['wallet_balance']}}</h3>
                </div>
                <div class="w-full">
                    <x-jet-label for="amount_to_be_added" value="{{ __('Amount to be added') }}" />
                    <x-jet-input id="amount_to_be_added" type="number" class="mt-1 block w-full" wire:model.defer="amount_to_be_added" autocomplete="amount_to_be_added" />
                    <x-jet-input-error for="amount_to_be_added" class="mt-2" />    
                </div>
            </div>
        </div>
        <div class=" flex flex-col sm:flex-row w-full inline justify-left sm:space-x-8">
             <!-- Transaction Number -->
            <div class="w-full">
                <x-jet-label for="transaction_number" value="{{ __('Transaction Number') }}" />
                <x-jet-input id="transaction_number" type="text" class="mt-1 block w-full" wire:model.defer="transaction_number" />
                <x-jet-input-error for="transaction_number" class="mt-2" />
            </div>
            <!-- Date of Transaction -->
            <div class="w-full">
                <x-jet-label for="date_of_transaction" value="{{ __('Date of the transaction') }}" />
                <x-jet-input id="date_of_transaction" type="date" class="mt-1 block w-full" wire:model.defer="date_of_transaction" autocomplete="date_of_transaction" />
                <x-jet-input-error for="date_of_transaction" class="mt-2" />
            </div>
            <!-- Bank -->
            <div class="w-full">
                <x-jet-label for="bank_account" value="{{ __('Receiving Bank Account') }}"/>
                <select name="bank_account" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="bank_account" autocomplete="bank_account">
                    <option value="" selected > Select receiving bank account</option>

                    <option value="scotia_account" >BNS Account Ending 1777</option>
                    <option value="ncb_account">NCB Account Ending 8031</option>
                    <option value="jn_account">JN Account Ending 8031</option>
                </select>
                <x-jet-input-error for="status" class="mt-2" />
            </div>
        </div>
        <x-jet-button class="">
            {{ __('Request Wallet Topup') }}
        </x-jet-button>  
    </form>
    <div class="overflow-hidden border-b border-gray-200 sm:rohunded-lg mt-6">
        <h1 class=" text-lg font-medium text-gray-700">Requested Topups</h1>
        <x-jet-section-border />

        <div class=" w-full bg-gray-100 mt-4">
          <div class="col-span-12">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Transaction No.
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Requested on
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Paid Amount
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  To Bank Account
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200  text-xs text-gray-500">
                          @foreach($topups as $topup)
                              <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-indigo-600">
                                    {{ @$topup->transaction_number }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $topup->created_at }} 
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $topup->amount_to_be_added }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap ">
                                    {{ ucwords(preg_replace('/_/',' ', @$topup->bank_account))}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <x-topup-status-span status="{{$topup->status}}">
                                      {{ ucwords($topup->status)}}
                                    </x-topup-status-span>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>
