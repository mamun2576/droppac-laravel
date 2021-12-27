<div class="mx-auto w-full mt-8 text-xs sm:text-sm">
    <div class="flex flex-row w-full">
        <button type="button" wire:click.prevent="changeStep(1)" class="{{ $currentStep == 1 ? 'bg-white text-purple border border-gray-300 border-b-0 rounded-t-md font-bold' : 'border border-gray-300 bg-gray-100' }} focus:outline-none outline-none cursor-pointer  p-2  text-gray-700 font-semibold rounded-t-md w-full "><span class="">Pickup</span></button>

        <button type="button" wire:click.prevent="changeStep(2)" class="{{ $currentStep == 2 ? 'bg-white border border-indigo-500 border-b-0 rounded-t-md font-bold' : 'border border-gray-300 bg-gray-100' }} focus:outline-none outline-none cursor-pointer p-2  text-gray-700 font-semibold rounded-t-md px-2 w-full" {{ $maxStep < 2 ? ' disabled' : '' }}>Drop-off</button>

        <button type="button" wire:click.prevent="changeStep(3)" class="{{ $currentStep == 3 ? 'bg-white border border-indigo-500 border-b-0 rounded-t-md font-bold' : 'border border-gray-300 bg-gray-100' }} focus:outline-none outline-none cursor-pointer p-2  text-gray-700 font-semibold rounded-t-md px-2 w-full" {{ $maxStep < 3 ? ' disabled' : '' }}>Packages</button>

        <button type="button" wire:click.prevent="changeStep(4)" class="{{ $currentStep == 4 ? 'bg-white border border-indigo-500 border-b-0 rounded-t-md font-bold' : 'border border-gray-300 bg-gray-100' }} focus:outline-none outline-none cursor-pointer p-2  text-gray-700 font-semibold rounded-t-md px-2 w-full" {{ $maxStep < 4 ? ' disabled' : '' }}>Services</button>

        <div class="border-b border-gray-300 flex-grow"></div>
    </div>
    <form class="mt-2" wire:submit.prevent="nextStep">
        @csrf
        @if($currentStep == 1)
        <div class="flex flex-col sm:flex-row sm:space-x-8">
            <div class="w-full">
                <div class="flex flex-col w-full ">
                    <div class="my-6">
                        <h2 class="text-lg font-medium text-purple">Pickup Location</h2>
                        <p class="text-xs text-gray-400">blah blah</p>
                    </div>
                    <div class=" flex  flex-col sm:flex-row sm:space-x-8 ">
                        <div class="flex flex-row items-center">
                            <x-jet-label for="sender_residence" value="{{ __('Place of residence') }}" />
                            <x-jet-input wire:click.prevent="setFromPlace('residence')" value="residence" id="sender_residence" name="place" type="radio" class="ml-4" wire:model.defer="pickup_place" />    
                        </div>
                        <div class="flex flex-row items-center">
                            <x-jet-label for="sender_business" value="{{ __('Place of business') }}" />
                            <x-jet-input wire:click.prevent="setFromPlace('business')" value="business" id="sender_business" name="place" type="radio" class="ml-4" wire:model.defer="pickup_place"/>    
                        </div>
                         <div class=" flex flex-row items-center">
                            <x-jet-label for="sender_knutsford" value="{{ __('Knutsford Express Office') }}" />
                            <x-jet-input wire:click.prevent="setFromPlace('knutsford')" value="knutsford" id="sender_knutsford" name="place" type="radio" class="ml-4" wire:model.defer="pickup_place" />   
                        </div>
                    </div>
                </div>
                <!-- Business -->
                @if($pickup_place == 'business')
                    <div class="w-full">
                        <x-jet-label for="pickup_business_name" value="{{ __('Name of business') }}" />
                        <x-jet-input id="pickup_business_name" name="pickup_business_name" type="text" class="mt-1 block w-full" wire:model.defer="pickup_business_name" autocomplete="pickup_business_name" />
                        <x-jet-input-error for="pickup_business_name" class="mt-2" />
                    </div>
                @endif
                @if($pickup_place == 'knutsford')
                <!-- Branch -->
                <div class="flex flex-col" >
                    <div class="w-full">
                        <x-jet-label for="pickup_knutsford_branch" value="{{ __('Branch') }}"/>
                        <select id="pickup_knutsford_branch" name="pickup_knutsford_branch" class="mt-1 block w-full border-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" autocomplete="pickup_knutsford_branch" wire:model.defer="pickup_knutsford_branch"> 
                            <option value="" disabled selected> Branch Location</option>
                            <option value="new_kingston">New Kingston</option>
                            <option value="souverign">Souverign</option>
                            <option value="portmore">Portmore</option>
                            <option value="angels" >Angles St. Catherine</option>
                        </select>
                        <x-jet-input-error for="pickup_knutsford_branch" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <x-jet-label for="pickup_knutsford_receipt_number" value="{{ __('Receipt number') }}" />
                        <x-jet-input id="pickup_knutsford_receipt_number" name="pickup_knutsford_receipt_number" type="text" class="mt-1 block w-full" wire:model.defer="pickup_knutsford_receipt_number" autocomplete="pickup_knutsford_receipt_number"/>
                        <x-jet-input-error for="pickup_knutsford_receipt_number" class="mt-2"/>
                    </div>
                    <div class="flex flex-row items-center">
                        <x-jet-input id="knutsford_fee_already_paid_for_pickup" name="knutsford_fee_already_paid_for_pickup" type="checkbox" class="mr-4" wire:model.defer="knutsford_fee_already_paid_for_pickup" /> 
                        <x-jet-label for="knutsford_fee_already_paid_for_pickup" value="{{ __('My Knutsford fees are already paid') }}" />
                    </div>
                </div> 
                @endif
                @if(($pickup_place == 'residence') || ($pickup_place == 'business'))
                <!-- Address Street & number -->
                <div class="w-full">
                    <x-jet-label for="pickup_address_street" value="{{ __('Street') }}" />
                    <x-jet-input id="pickup_address_street" type="text" class="mt-1 block w-full"  name="pickup_address_street" wire:model.defer="pickup_address_street" autocomplete="pickup_address_street"/>
                    <x-jet-input-error for="pickup_address_street" class="mt-2" />
                </div>
                <!-- community -->
                <div class="w-full">
                    <x-jet-label for="pickup_address_community" value="{{ __('Community, town, etc.') }}" />
                    <x-jet-input id="pickup_address_community" name="pickup_address_community" type="text" class="mt-1 block w-full" wire:model.defer="pickup_address_community" autocomplete="pickup_address_community" />
                    <x-jet-input-error for="pickup_address_community" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-jet-label for="pickup_address_parish" value="{{ __('Parish') }}" />
                    <select id="pickup_address_parish" class="mt-1 block w-full border-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('pickup_address_parish')border-red-500 @else border-indigo-500 @endif" wire:model="pickup_address_parish" autocomplete="pickup_address_parish">
                        <option value="">--</option>
                        @foreach($parishes as $parish)
                            <option value="{{ $parish->id }}">{{ $parish->name }}</option>
                        @endforeach
                    </select>
                    @error('pickup_address_parish')
                    <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                @endif
            </div>
            <div class="w-full">
                <div class="flex flex-col w-full">
                    <div class="my-6">
                        <h2 class="text-lg font-medium text-purple">Sender</h2>
                        <p class="text-xs text-gray-400">Who is sending the package?</p>
                    </div>
                    <div class="">
                        <div class="w-full">
                            <x-jet-label for="sender_first_name" value="{{ __('First name') }}" />
                            <x-jet-input id="sender_first_name"  type="text" class="mt-1 block w-full" name="sender_first_name"  wire:model.defer="sender_first_name" autocomplete="sender_first_name"/>
                            <x-jet-input-error for="sender_first_name" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-jet-label for="sender_last_name" value="{{ __('Last name') }}" />
                            <x-jet-input  id="sender_last_name" name="sender_last_name" type="text" class="mt-1 block w-full" wire:model.defer="sender_last_name" autocomplete="sender_last_name"/>
                            <x-jet-input-error for="sender_last_name" class="mt-2" />
                        </div>
                    </div>
                    <div class="">
                        <div class="w-full">
                            <x-jet-label for="sender_contact_number" value="{{ __('Contact number') }}" />
                            <x-jet-input  id="sender_contact_number" name="sender_contact_number" type="text" class="mt-1 block w-full" wire:model.defer="sender_contact_number" autocomplete="sender_contact_number"/>
                            <x-jet-input-error for="sender_contact_number" class="mt-2" />
                        </div>
                        <div class="w-full">
                            <x-jet-label  for="sender_email_address" value="{{ __('Email address') }}" />
                            <x-jet-input  id="sender_email_address" name="sender_email_address" type="email" class="mt-1 block w-full" wire:model.defer="sender_email_address"  autocomplete="sender_email_address"/>
                            <x-jet-input-error for="sender_email_address" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-6">
                        <x-jet-button class="w-full text-center">
                            {{ __('Next') }}
                        </x-jet-button>  
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($currentStep == 2)
        <div class="flex flex-col sm:flex-row sm:space-x-8">
            <div class="w-full">
                <div class="flex flex-col w-full ">
                    <div class="my-6">
                        <h2 class="text-lg font-medium text-purple">Delivery Address</h2>
                        <p class="text-xs text-gray-400">Select if your packages should be delivered to a residence, business or Knutford Express office.</p>
                    </div>
                    <div class=" flex  flex-col sm:flex-row sm:justify-between">
                        <div class="flex flex-row items-center">
                            <x-jet-label for="recipient_residence" value="{{ __('Place of residence') }}" />
                            <x-jet-input wire:click.prevent="setToPlace('residence')" value="residence" id="recipient_residence" name="place" type="radio" class="ml-2" wire:model.defer="dropoff_place" />    
                        </div>
                        <div class="flex flex-row items-center">
                            <x-jet-label for="recipient_business" value="{{ __('Place of business/Post Office') }}" />
                            <x-jet-input wire:click.prevent="setToPlace('business')" value="business" id="recipient_business" name="place" type="radio" class="ml-2" wire:model.defer="dropoff_place"/>    
                        </div>
                        <div class=" flex flex-row items-center">
                            <x-jet-label for="recipient_knutsford" value="{{ __('Knutsford Express Office') }}" />
                            <x-jet-input wire:click.prevent="setToPlace('knutsford')" value="knutsford" id="recipient_knutsford" name="place" type="radio" class="ml-2" wire:model.defer="dropoff_place"/>   
                        </div>
                    </div>
                </div>
                <!-- Business -->
                @if($dropoff_place == 'business')
                    <div class="w-full">
                        <x-jet-label for="dropoff_business_name" value="{{ __('Name of business') }}" />
                        <x-jet-input id="dropoff_business_name" type="text" name="dropoff_business_name" class="mt-1 block w-full mt-2" wire:model.defer="dropoff_business_name" autocomplete="dropoff_business_name" />
                        <x-jet-input-error for="dropoff_business_name"/>
                    </div>
                @endif
                @if($dropoff_place == 'knutsford')

                <!-- Branch -->
                <div class="flex flex-col sm:flex-row sm:space-x-8 my-6" >
                    <div class="w-full">
                        <x-jet-label for="dropoff_knutsford_branch" value="{{ __('Branch') }}"/>
                        <select id="dropoff_knutsford_branch" class="mt-1 block w-full border-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="dropoff_knutsford_branch" autocomplete="dropoff_knutsford_branch" wire:model.defer="dropoff_knutsford_branch"> 
                            <option value="" disabled> Branch Location</option>
                            <option value="new_kingston">New Kingston</option>
                            <option value="souverign">Souverign</option>
                            <option value="portmore">Portmore</option>
                            <option value="angels" >Angles St. Catherine</option>
                        </select>
                        <x-jet-input-error for="dropoff_knutsford_branch" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <x-jet-label for="dropoff_knutsford_receipt_number" value="{{ __('Receipt number') }}" />
                        <x-jet-input id="dropoff_knutsford_receipt_number" type="text"  name="dropoff_knutsford_receipt_number" class="mt-1 block w-full" wire:model.defer="dropoff_knutsford_receipt_number" autocomplete="dropoff_knutsford_receipt_number"/>
                        <x-jet-input-error for="dropoff_knutsford_receipt_number" class="mt-2"/>
                    </div>
                </div> 
                <div class="flex flex-row items-center">
                    <x-jet-input id="recipient_is_paying_knutsford_fee" type="checkbox" name="recipient_is_paying_knutsford_fee" class="mr-4" wire:model.defer="recipient_is_paying_knutsford_fee" /> 
                    <x-jet-label for="recipient_is_paying_knutsford_fee" value="{{ __('The recipient will pay the Knutford fees') }}" />
                </div>
                @endif
                @if(($dropoff_place == 'residence') || ($dropoff_place == 'business'))
                <!-- Address Street & number -->
                <div class="w-full">
                    <x-jet-label for="delivery_address_street" value="{{ __('Street') }}" />
                    <x-jet-input id="delivery_address_street" type="text" class="mt-1 block w-full"  name="delivery_address_street" wire:model.defer="delivery_address_street" autocomplete="delivery_address_street"/>
                    <x-jet-input-error for="delivery_address_street" class="mt-2" />
                </div>
                <!-- community -->
                <div class="w-full">
                    <x-jet-label for="delivery_address_community" value="{{ __('Community, town, etc.') }}" />
                    <x-jet-input id="delivery_address_community" type="text" class="mt-1 block w-full" wire:model.defer="delivery_address_community" autocomplete="delivery_address_community" />
                    <x-jet-input-error for="delivery_address_community" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-jet-label for="delivery_address_parish" value="{{ __('From Parish') }}" />
                    <select id="delivery_address_parish" class="mt-1 block w-full border-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  @error('delivery_address_parish')border-red-500 @else border-indigo-500 @endif" wire:model="delivery_address_parish" autocomplete="delivery_address_parish">
                        <option value="">--</option>
                        @foreach($parishes as $parish)
                            <option value="{{ $parish->id }}">{{ $parish->name }}</option>
                        @endforeach
                    </select>
                    @error('delivery_address_parish')
                    <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                @endif
            </div>
            <div class="flex flex-col w-full">
                <div class="my-6">
                    <h2 class="text-lg font-medium text-purple">Recipient</h2>
                    <p class="text-xs text-gray-400">Who will receive the package?</p>
                </div>
                <div class="">
                    <div class="w-full">
                        <x-jet-label for="recipient_first_name" value="{{ __('First name') }}" />
                        <x-jet-input id="recipient_first_name"  type="text" class="mt-1 block w-full" name="recipient_first_name"  wire:model.defer="recipient_first_name" autocomplete="recipient_first_name"/>
                        <x-jet-input-error for="recipient_first_name" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <x-jet-label for="recipient_last_name" value="{{ __('Last name') }}" />
                        <x-jet-input  id="recipient_last_name" name="recipient_last_name" type="text" class="mt-1 block w-full" wire:model.defer="recipient_last_name" autocomplete="recipient_last_name"/>
                        <x-jet-input-error for="recipient_last_name" class="mt-2" />
                    </div>
                </div>
                <div class="">
                    <div class="w-full">
                        <x-jet-label for="recipient_contact_number" value="{{ __('Contact number') }}" />
                        <x-jet-input  id="recipient_contact_number" name="recipient_contact_number" type="text" class="mt-1 block w-full" wire:model.defer="recipient_contact_number" autocomplete="recipient_contact_number"/>
                        <x-jet-input-error for="recipient_contact_number" class="mt-2" />
                    </div>
                    <div class="w-full">
                        <x-jet-label  for="recipient_email_address" value="{{ __('Email address') }}" />
                        <x-jet-input  id="recipient_email_address" name="recipient_email_address" type="email" class="mt-1 block w-full" wire:model.defer="recipient_email_address"  autocomplete="recipient_email_address"/>
                        <x-jet-input-error for="recipient_email_address" class="mt-2" />
                    </div>
                </div>
                <div class="mt-6">
                    <x-jet-button class="w-full text-center">
                        {{ __('Next') }}
                    </x-jet-button>  
                </div>
            </div>
        </div>   
        @endif
        @if($currentStep == 3)
        <div class="flex flex-col w-full ">
            <div class="my-6">
                <h2 class="text-lg font-medium text-purple">Packages</h2>
                <p class="text-xs text-gray-400">You may add up to 25 packages here</p>
            </div>
            <div class="text-xs text-gray-700 grid grid-cols-1 sm:grid-cols-3 gap-2">
                @foreach ($packages as $index => $package)
                    <div class="mx-auto flex flex-col mb-4 w-full py-2 px-6 {{ $package['is_saved'] ? ' bg-gray-100' : 'bg-gray-50' }} border border-gray-200 rounded-md">
                        <div class="mx-auto border-b border-gray-300 text-gray-700 font-bold text-lg p-4 mb-4">
                            <span class="mx-auto">{{  $count++ }}</span>
                        </div>
                        <div class="flex flex-row space-x-8">
                            @if($package['is_saved'])
                            <div>
                                <x-jet-label for="packages[{{$index}}][weight]" value="{{ __('Weight(lbs)') }}" />
                                <x-jet-input type="hidden" name="packages[{{$index}}][weight]" wire:model="packages.{{$index}}.weight"/>
                                {{ number_format($package['weight'], 2) }} lbs
                            </div>
                            @else
                            <div>
                                <x-jet-label for="packages[{{$index}}][weight]" value="{{ __('Weight(lbs)') }}" />
                                <x-jet-input type="number" name="packages[{{$index}}][weight]" class="mt-1 block w-full" wire:model="packages.{{$index}}.weight" />
                            </div>
                            @endif
                             <div class="">
                            @if($package['is_saved'])
                            <div>
                                <x-jet-label for="packages[{{$index}}][quantity]" value="{{ __('Qty.') }}" />
                                <x-jet-input type="hidden" name="packages[{{$index}}][quantity]" wire:model="packages.{{$index}}.quantity"/>
                                {{ $package['quantity'] }}
                            </div>
                            @else
                            <div>
                                <x-jet-label for="packages[{{$index}}][quantity]" value="{{ __('Qty.') }}" />
                                <x-jet-input  type="number" step="1" name="packages[{{$index}}][quantity]" class="mt-1 block w-full" wire:model="packages.{{$index}}.quantity"/>
                                <x-jet-input-error for="packages.{{$index}}.quantity" class="mt-2" />
                            </div>
                            @endif
                        </div>
                        </div>
                       
                        <div class="sm:w-84">
                            @if($package['is_saved'])
                            <div class="">
                                <x-jet-label for="packages[{{$index}}][content]" value="{{ __('Contents') }}" />
                                <x-jet-input type="hidden" name="packages[{{$index}}][content]" wire:model="packages.{{$index}}.content"/>
                                {{ $package['content'] }}

                            </div>
                            @else
                            <div class="">
                                <x-jet-label for="packages[{{$index}}][content]" value="{{ __('Contents') }}" />
                                <textarea type="text" name="packages[{{$index}}][content]" rows="1" class="w-full mt-1 block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " wire:model="packages.{{$index}}.content"/>
                                </textarea> 
                                <x-jet-input-error for="packages.{{$index}}.content" class="mt-2" />
                            </div>
                            @endif
                        </div>
                        @if($errors->has('packages.' . $index))
                            <em class="text-sm text-red-500 mt-2">
                                {{ $errors->first('packages.' . $index) }}
                            </em>
                        @endif
                        <div class="border-t border-gray-300 mx-auto w-full mt-4">
                            <div class="my-4 w-full space-x-8">
                                @if($package['is_saved'])
                                    <a class="p-2 hover:bg-blue-600 bg-blue-500 text-white focus:outline-none outline-none cursor-pointer" wire:click.prevent="editPackage({{$index}})" wire:loading.attribute="bg-green-100">Edit</a>
                                @elseif($package['weight'])
                                    <a class="hover:bg-green-600 bg-green-500 p-2 text-white focus:outline-none outline-none cursor-pointer" wire:click.prevent="savePackage({{$index}})" wire:loading.attribute="bg-green-100">Save</a>
                                @endif
                                <a class="hover:bg-red-600 bg-red-500 p-2 text-white focus:outline-none outline-none cursor-pointer" wire:click.prevent="removePackage({{$index}})">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3 flex justify-end">
                <div class="flex flex-col">
                    <x-jet-input-error for="packages" class="mt-2 mb-2" />
                    <a class="hover:bg-green-600 p-1 px-4 bg-green-500 border border-green-600 rounded-sm text-white text-sm focus:outline-none cursor-pointer" wire:click.prevent="addPackage">+ Add Package</a>
                </div>
            </div>
            <div class="flex justify-end mt-3">
                <table>
                    <tr class="border-t border-gray-300">
                        <th class="text-sm font-semibold">Total No. Of Packages</th>
                        <td>{{ number_format($number_of_pieces, 2) }}</td>
                    </tr>
                    <tr class="border-t border-gray-300">
                        <th class="text-sm font-semibold">Total Weight</th>
                        <td>{{ number_format($total_weight, 2) }}</td>
                    </tr>
                </table>
            </div>
            <div class="flex justify-center">
                <x-jet-button class="text-center text-white">
                    {{ __('Next') }}
                </x-jet-button>  
            </div>
        </div>
        @endif
        @if($currentStep == 0)
            <div class="mt-4">
                <div class="my-6">
                    <h2 class="text-lg font-medium text-purple">Delivery Services</h2>
                    <p class="text-xs text-gray-400">Select the delivery service to receive your package on the day and time that's most convenient to you?</p>
                </div>
                <div class="flex flex-col sm:flex-row w-full">
                    <div class="w-full mb-4">
                        <ul class="flex sm:flex-row flex-col">
                            <li class="mb-4 sm:mr-4">
                                <button wire:click.prevent="setDeliveryServiceChoice('next_day')"  class="mr-2 hover:bg-blue-400 {{$delivery_service_choice == 1 ? 'bg-blue-600 text-white border-blue-600' : 'bg-white' }} rounded-lg text-left text-xs sm:text-sm border w-full ">
                                    <div class="flex flex-col p-4 mb-2">
                                        <div class="flex flex-row items-center font-medium">
                                            <span>ARRIVED. Next Day</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <h5>Arrived by Saturday May 25, 2021</h5>
                                            <h5>By 4:00 PM</h5>
                                        </div>
                                    </div>
                                </button>
                            </li>
                            <li>
                                <button wire:click.prevent="setDeliveryServiceChoice('next_day_priority')" class="hover:bg-blue-400 {{$delivery_service_choice == 2 ? 'bg-blue-600 text-white border-blue-600' : 'bg-white' }} rounded-lg text-left text-xs sm:text-sm border w-full">
                                    <div class="flex flex-col p-4 mb-2">
                                        <div class="flex flex-row items-center font-medium">
                                            <span>ARRIVED. Next Day</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <h5>Arrived by Saturday May 25, 2021</h5>
                                            <h5>By 10:00 AM</h5>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="min-h-screen w-full sm:px-6">
                        <div class="mb-6">
                            <p class="text-xs text-gray-400">Select the delivery service to receive your package on the day and time that's most convenient to you?</p>
                        </div> 
                        <div class="rounded-md bg-gray-100 p-4 mb-6">
                            <h2 class="text-sm font-medium text-purple">Protection</h2>
                            <p class="text-xs text-gray-400">Select the delivery service to receive your package on the day and time that's most convenient to you?</p>
                            <div class="flex flex-col sm:flex-row sm:space-x-8">
                                <div>
                                    <x-jet-label for="declared_value" value="{{ __('Declared value') }}" />
                                    <div class="flex flex-row items-center">
                                         <span class="inline-block mr-4">$</span> 
                                         <x-jet-input  type="number" name="declared_value" class="mt-1 inline-block w-full sm:w-2/3" wire:model="declared_value"/>                                        
                                    </div>
                                    <x-jet-input-error for="declared_value" class="mt-2" />
                                </div>
                                <div class="items-center ml-6">
                                    <x-jet-input id="insurance" name="insurance" type="checkbox" class="mr-4 inline-block " wire:model.defer="insurance" /> 
                                    <x-jet-label class="inline-block" for="insurance" value="{{ __('Add protection') }}" />
                                </div>  
                            </div>
                        </div>
                        <div class="rounded-md bg-gray-100 p-4 mb-6">
                            <h2 class="text-sm font-medium text-purple">Additional Instructions</h2>
                            <div class="flex flex-col mt-4">
                                <div>
                                     <textarea class="mt-1 w-full border-gray-100" placeholder="Type instruction here ..." name="declared_value" wire:model="declared_value"/></textarea>                                        
                                    <x-jet-input-error for="addition_info" class="mt-2" />
                                </div>
                                <div>
                                    <x-jet-label for="declared_value" value="{{ __('Pay third party') }}" />
                                    <div class="flex flex-row items-center">
                                         <span class="inline-block mr-4">$</span> 
                                         <x-jet-input  type="number" name="declared_value" class="mt-1 inline-block w-full sm:w-1/2" wire:model="declared_value"/>                                        
                                    </div>
                                    <x-jet-input-error for="declared_value" class="mt-2" />
                                </div>
                                <div class="items-center ml-6">
                                    <x-jet-input id="keep_dry" name="keep_dry" type="checkbox" class="mr-4 inline-block " wire:model.defer="insurance" /> 
                                    <x-jet-label class="inline-block" for="keep_dry" value="{{ __('Signature required on delivery') }}" />
                                </div>    
                            </div>
                        </div>
                        <div class="mt-6">
                            <x-jet-button class="w-full text-center">
                                {{ __('CHECKOUT') }}
                            </x-jet-button>  
                        </div> 
                    </div>
                </div>
            </div>
        @endif
         @if($currentStep == 4)
            <div class="mt-4">
                <div class="my-6">
                    <h2 class="text-lg font-medium text-purple">Summary</h2>
                    <p class="text-xs text-gray-400">Please review your schedule below before clicking the pay now button</p>
                </div>
                <div class="flex flex-col sm:flex-row w-full">
                    <div class="w-full"> 
                        <div class="rounded-md bg-gray-100 py-4 px-6 ">
                            <h2 class="text-sm font-medium text-purple mt-6">Pickup & Drop-off</h2>
                            <div class="flex flex-col mt-4">
                                <div class="flex flex-col sm:flex-row justify-between">
                                    <div class="flex flex-col ">
                                        <div class="flex flex-row space-x-8">
                                            <div>
                                                <a wire:click.prevent="changeStep(1)" class="text-indigo-600 focus:outline-none outline-none cursor-pointer">Sender</a>
                                                <p class="text-gray-700 font-medium">{{$sender_first_name}} {{$sender_last_name}} </p>
                                            </div>
                                            <div class="sm:mt-0">
                                                <a wire:click.prevent="changeStep(1)" class="text-indigo-600  focus:outline-none outline-none cursor-pointer">Pickup at location</a>
                                                @if($pickup_place == 'residence' || $pickup_place == 'business')
                                                    <div class="flex flex-col">
                                                        @if($pickup_place == 'business')
                                                            <p class="text-gray-700 font-medium">{{$pickup_business_name}},</p>
                                                        @endif
                                                        <p class="text-gray-700 font-medium">{{$pickup_address_street}},</p>
                                                        <p class="text-gray-700 font-medium">{{$pickup_address_community}},</p>
                                                        <p class="text-gray-700 font-medium">{{$pickup_parish->name}} </p> 
                                                    </div>
                                                    @else
                                                    <div class="flex flex-col">
                                                        <p class="text-gray-700 font-medium">Knutsford {{ucwords(Str::replace('_',' ',$pickup_knutsford_branch))}},</p>
                                                        <p class="text-gray-700 font-medium">Receipt # {{$pickup_knutsford_receipt_number}}</p>
                                                    </div>
                                                @endif
                                            </div> 
                                        </div>
                                        <div class="flex flex-row space-x-8 mt-6">
                                            <div>
                                                <a wire:click.prevent="changeStep(2)" class="text-indigo-600 focus:outline-none outline-none cursor-pointer">Recipient</a>
                                                <p class="text-gray-700 font-medium">{{$recipient_first_name}} {{$recipient_last_name}} </p>
                                            </div>
                                            <div class="sm:mt-0">
                                                <a wire:click.prevent="changeStep(2)" class="text-indigo-600 focus:outline-none outline-none cursor-pointer">Drop-off at location
                                                </a>
                                                @if($dropoff_place == 'residence' || $dropoff_place == 'business')
                                                    <div class="flex flex-col">
                                                        @if($dropoff_place == 'business')
                                                            <p class="text-gray-700 font-medium">{{$dropoff_business_name}},</p>
                                                        @endif
                                                        <div class="flex flex-col">
                                                            <p class="text-gray-700 font-medium">{{$delivery_address_street}},</p>
                                                            <p class="text-gray-700 font-medium">{{$delivery_address_community}},</p> 
                                                            <p class="text-gray-700 font-medium">{{$delivery_parish->name}} </p> 
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="flex flex-col">
                                                        <p class="text-gray-700 font-medium">Knutsford {{ucwords(Str::replace('_',' ',$dropoff_knutsford_branch))}},</p>
                                                        <p class="text-gray-700 font-medium">Receipt # {{$dropoff_knutsford_receipt_number}}</p>
                                                    </div>
                                                @endif
                                            </div> 
                                        </div>                            
                                    </div> 
                                    <div class="mt-6 sm:mt-0">
                                        <a wire:click.prevent="changeStep(3)" class="text-indigo-600 focus:outline-none outline-none cursor-pointer">Packages</a>
                                        <div class="flex flex-row space-x-8">
                                            <p class="text-gray-700 font-medium">Number of pieces</p><span class="font-bold text-green-500">{{ number_format($number_of_pieces, 1) }}</span>
                                        </div>
                                        <div class="flex flex-row space-x-8">
                                            <p class="text-gray-700 font-medium">Total weight</p><span class="font-bold text-green-500">{{ number_format($total_weight, 2) }} lbs</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between border-t border-gray-300 py-4 mt-6">
                                    <p class="text-blue-500">{{($total_weight - 10) > 0 ? ($total_weight - 10 ) : 0}} lbs extra @ $45.00 per pounds</p><span class="font-bold text-red-600">${{ number_format($extra_weight_cost, 2) }}</span>
                                </div>    
                                <div class="flex flex-col border-t border-gray-300">
                                    <div class="flex flex-col">
                                        <h5 class="text-purple font-medium py-4">Delivery Service</h5>
                                        <div class="flex flex-row justify-between">
                                           <div class="w-full"> 
                                                <select name="selected_service" class="bg-blue-100 focus:outline border-2 border-gray-300 p-1 px-6 py-2 text-xs font-medium sm:text-lg" wire:model="selected_service">
                                                    <option value="">-- choose service --</option>
                                                    @foreach ($arrived_services as $arrived_service)
                                                        <option value="{{ $arrived_service->id }}" >
                                                            <span >{{ $arrived_service->name }} (${{ number_format(@$arrived_service->cost, 2) }})</span>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="font-bold text-red-600">${{ number_format(@$service->cost, 2) }}</div>
                                        </div>
                                         <div class="mt-2">
                                            <h5 class="text-gray-600 font-medium py-2">Expected Delivery Date & Time</h5>
                                            <p class="text-green-500 font-bold">Saturday May 25, 2021 by 4:00 PM</p>
                                        </div> 
                                    </div>
                                </div> 
                                <!--
                                    <div class="flex flex-row items-center sm:space-x-8 mt-4"> 
                                        <div class="mb-6">
                                            <h2 class="text-sm font-medium text-purple">Protection</h2>
                                            <p class="text-xs text-gray-400">Select the delivery service to receive your package on the day and time that's most convenient to you?</p>
                                            <div class="flex flex-col sm:flex-row sm:space-x-8">
                                                <div>
                                                    <x-jet-label for="declared_value" value="{{ __('Declared value') }}"/>
                                                    <div class="flex flex-row items-center">
                                                         <x-jet-input  type="number" name="declared_value" class="mt-1 inline-block px-6 " wire:model="declared_value"/> 
                                                    </div>
                                                    <x-jet-input-error for="declared_value" class="mt-2"/>
                                                </div>
                                                <div class="items-center sm:ml-6">
                                                    <x-jet-input id="insurance" name="insurance" type="checkbox" class="mr-4 inline-block " wire:model.defer="insurance"/> 
                                                    <x-jet-label class="inline-block" for="insurance" value="{{ __('Add protection') }}"/>
                                                </div>  
                                            </div>
                                        </div>
                                        <div>$ 0.00 </div> 
                                    </div> 
                                -->
                                <div class="flex flex-col border-t border-gray-300 mt-6">
                                    <h5 class="text-purple font-medium py-4">Special Handling</h5>
                                    <div class="flex flex-col ml-4">
                                        @foreach($special_handlings as $handling)
                                            <div class="items-center flex flex-row justify-between">
                                                <div class="">
                                                    <x-jet-input name="{{$handling->name}}" type="checkbox" class="rounded-full mr-4 inline-block " wire:model="selected_handlings" value="{{$handling->id}}"/> 
                                                    <p class="inline-block" for="{{$handling->name}}"/> {{$handling->name}}</p>
                                                </div>
                                                <div>
                                                    @if(in_array($handling->id, $selected_handlings))
                                                        ${{ number_format($handling->cost, 2) }}
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> 
                                </div>         
                            </div>
                            <div class="flex flex-col mt-4 border-t border-gray-300">
                                <h5 class="text-purple font-medium py-4">Third Party Payment</h5>
                                <div class="items-center flex flex-row justify-between">
                                    <div class="">
                                       Knutsford Fee
                                    </div>
                                    <div>${{ number_format($knutsford_charges, 2) }}</div>
                                </div>
                            </div>
                            <div class="flex flex-col mt-4 pt-4 border-t border-gray-300">
                                <div class="items-center flex flex-row justify-between">
                                    <div class="font-medium">
                                        Subtotal
                                    </div>
                                    <div>${{ number_format($subtotal, 2) }}</div>
                                </div>
                                <div class="items-center flex flex-row justify-between">
                                    <div class="font-medium">
                                       G.C.T  
                                    </div>
                                    <div>15 %</div>
                                </div>
                                <div class="items-center flex flex-row justify-between">
                                    <div class="font-bold">
                                       Payment Total 
                                    </div>
                                    <div class="font-bold text-red-600">${{ number_format($total_cost, 2) }} JMD</div>
                                </div>
                            </div>
                            <div class="flex flex-col mt-6 border-t border-gray-300 py-2">
                                <h2 class="text-sm font-medium text-purple py-2">Additional Instructions</h2>
                                <textarea class="mt-1 w-full border border-gray-300" placeholder="Type instruction here ..." name="additional_instruction" wire:model="additional_instruction"/></textarea>                   
                                <x-jet-input-error for="additional_instruction" class="mt-2" />
                            </div>      
                        </div>
                    </div>
    </form>
                    <div class="w-full mb-4 mt-6 sm:mt-0 sm:ml-8">
                        <div class="mb-6">
                            <h2 class="text-sm font-medium text-purple">Payment Method</h2>
                            <p class="text-xs text-gray-400">Select the delivery service to receive your package on the day and time that's most convenient to you?</p>
                        </div>
                        <ul class="flex sm:flex-row flex-col">
                            @if((@Auth::user()->wallet_balance) >= $total_cost )
                             <li class="mb-4 sm:mr-4">
                                <button wire:click.prevent="setDeliveryServiceChoice('next_day')"  class="mr-2 hover:bg-blue-400 {{$payment_option == 1 ? 'bg-blue-600 text-white border-blue-600' : 'bg-white' }} rounded-sm text-left text-xs sm:text-sm border w-full ">
                                    <div class="flex flex-col p-4 mb-2">
                                        <div class="flex flex-row items-center font-medium">
                                            <span>Pay with Wallet</span>
                                        </div>
                                        <div class="flex flex-col w-full">
                                            <h5>Balance on wallet </h5>
                                            <h5>${{ number_format(@Auth::user()->wallet_balance, 2) }}</h5>
                                        </div>
                                    </div>
                                </button>
                            </li>
                            @endif
                            <li>
                                <button wire:click.prevent="setDeliveryServiceChoice('next_day_priority')" class="hover:bg-blue-400 {{$payment_option == 2 ? 'bg-blue-600 text-white border-blue-600' : 'bg-white' }} rounded-lg text-left text-xs sm:text-sm border w-full">
                                    <div class="flex flex-col p-4 mb-2">
                                        <div class="flex flex-row items-center font-medium">
                                            <span>ARRIVED. Next Day</span>
                                        </div>
                                        <div class="flex flex-col">
                                            <h5>Arrived by Saturday May 25, 2021</h5>
                                            <h5>By 10:00 AM</h5>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        </ul>
                        <form action="/create-checkout-session.php" method="POST">
                            <button type="submit" id="checkout-button">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
</div>

@section('extra_js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        
    </script>   
@endsection

@section('extra_css')
    <style type="text/css">
        #checkout-button {
              height: 36px;
              background: #556cd6;
              color: white;
              width: 100%;
              font-size: 14px;
              border: 0;
              font-weight: 500;
              cursor: pointer;
              letter-spacing: 0.6;
              border-radius: 0 0 6px 6px;
              transition: all 0.2s ease;
              box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
            }
        #checkout-button:hover {
          opacity: 0.8;
        }
    </style>
@endsection
