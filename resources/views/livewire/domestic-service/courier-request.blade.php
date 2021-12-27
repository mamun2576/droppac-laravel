
<div class="flex flex-row">
 
    <div class="mx-auto flex flex-col sm:ml-6">
        <div class="mr-8 mb-4">
            <h1 class="text-3xl text-gray-700 font-bold my-6">Schedule A Pickup</h1>
             <x-jet-section-border />
            <div class="flex flex-row items-center space-x-8">
                <h2 class="text-2xl font-semibold text-purple">{{ $sub_heading }}</h2>
                <p class="text-xs font-normal text-gray-400"> 
                    {{ $note }}
                </p>   
            </div>
        </div>
        @if($tab == 'pickup')
            <form wire:submit.prevent="setPickupAddress">
                <div class="bg-gray-50 px-6">
                    <div class="flex flex-col sm:flex-row sm:space-x-8">
                        <div class="flex flex-col w-full ">
                            <div class="my-6">
                                <h2 class="text-lg font-medium text-purple">Location</h2>
                                <p class="text-xs text-gray-400">{{ $note }}</p>
                            </div>
                            <div class=" flex flex-row space-x-8">
                                <div class="flex flex-row items-center">
                                    <x-jet-label for="pickup_place" value="{{ __('Place of business') }}" />
                                    <x-jet-input wire:click="pickupPlace('business')" id="pickup_place" name="pickup_place" type="radio" class="ml-4" wire:model.defer="pickup_place" />    
                                </div>
    
                                 <div class=" flex flex-row items-center">
                                    <x-jet-label for="pickup_place_knutsford" value="{{ __('Knutsford Express Office') }}" />
                                    <x-jet-input wire:click="pickupPlace('knutsford')" id="pickup_place_knutsford" name="pickup_place" type="radio" class="ml-4" />    
                                </div>
                                <x-jet-input-error for="knutsford_office" class="mt-2" wire:model.defer="pickup_place"/>
                            </div>
                            <!-- Business -->
                            @if($pickup_place == 'business')
                            <div class="w-full">
                                <x-jet-label for="business_name" value="{{ __('Name of business') }}" />
                                <x-jet-input name="business_name" type="text" class="mt-1 block w-full" wire:model.defer="business_name" />
                                <x-jet-input-error for="business_name" class="mt-2" />
                            </div>
                            @endif

                            @if($pickup_place == 'knutsford')
                            <!-- Branch -->
                            <div class="flex flex-col sm:flex-row sm:space-x-8 my-6" >
                                <div class="w-full">
                                    <x-jet-label for="knutsford_office" value="{{ __('Branch') }}"/>
                                    <select name="knutsford_office" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" autocomplete="knutsford_office" wire:model.defer="knutsford_office"> 

                                        <option value="" disabled selected> Branch Location</option>
                                        <option value="new_kingston">New Kingston</option>
                                        <option value="souverign">Souverign</option>
                                        <option value="portmore">Portmore</option>
                                        <option value="angels" >Angles St. Catherine</option>
                                    </select>
                                    <x-jet-input-error for="knutsford_office" class="mt-2" />
                                </div>
                                <div class="w-full">
                                    <x-jet-label for="knutsford_receipt_number" value="{{ __('Receipt number') }}" />
                                    <x-jet-input name="knutsford_receipt_number" type="text" class="mt-1 block w-full" wire:model.defer="knutsford_receipt_number" />
                                    <x-jet-input-error for="knutsford_receipt_number" class="mt-2" />
                                </div>
                            </div> 
                            <div class=" flex flex-row items-center">
                                <x-jet-input wire:click="setPaid" name="knutsford_paid" type="checkbox" class="mr-4" wire:model.defer="knutsford_paid"/> 
                                <x-jet-label for="knutsford_paid" value="{{ __('My Knutsford fees are already paid') }}" />
                            </div>
                            @endif

                            @if($pickup_place != 'knutsford')
                            <!-- Address Street & number -->
                            <div class="w-full">
                                <x-jet-label for="address" value="{{ __('Address') }}" />
                                <x-jet-input type="text" class="mt-1 block w-full" id="address" wire:model.defer="address"/>
                                <x-jet-input-error for="address" class="mt-2" />
                            </div>
                            <!-- community -->
                            <div class="w-full">
                                <x-jet-label for="community" value="{{ __('Community, town, etc.') }}" />
                                <x-jet-input id="community" type="text" class="mt-1 block w-full" wire:model.defer="community" />
                                <x-jet-input-error for="community" class="mt-2" />
                            </div>
                            <div class="w-full">
                                    <x-jet-label for="parish" value="{{ __('Parish') }}"/>
                                    <select wire:model.defer="parish" name="parish" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" autocomplete="parish">
                                        <option value="" disabled selected>Select a parish</option>
                                        <option value="kingston" @if($parish == 'kingston') selected @endif>Kingston</option>
                                        <option value="st_andrew" @if($parish == 'st_andrew') selected @endif>St. Andrew</option>
                                        <option value="st_catherine" @if($parish =='st_catherine') selected @endif>St. Catherine</option>
                                        <option value="clarendon" @if($parish == 'clarendon') selected @endif>Clarendon</option>
                                        <option value="st_ann" @if($parish == 'st_ann') selected @endif>St. Ann</option>
                                        <option value="manchester" @if($parish == 'manchester') selected @endif>Manchester</option>
                                        <option value="st_elizabeth" @if($parish == 'st_elizabeth') selected @endif>St. Elizabeth</option>
                                        <option value="westmoreland" @if($parish== 'westmoreland') selected @endif>Westmoreland</option>
                                        <option value="st_james" @if($parish == 'st_james') selected @endif>St. James</option>
                                        <option value="falmouth" @if($parish== 'falmouth') selected @endif>Falmouth</option>
                                        <option value="port_antonio" @if($parish== 'port_antonio') selected @endif>Port Antonio</option>
                                        <option value="st_thomas" @if($parish== 'st_thomas') selected @endif>St. Thomas</option>
                                    </select>
                                    <x-jet-input-error for="parish" class="mt-2" />
                            </div>
                            @endif
                            <div class="my-6">
                                <x-jet-button class="justify-center w-full">
                                    {{ __('Verify Pickup Location') }}
                                </x-jet-button>  
                            </div>
                        </div>    
                    </div>
                </div>
            </form>
        @endif
        @if($tab == 'dropoff')
            <form wire:submit.prevent="setDeliveryAddress">
                <div class="bg-gray-50 px-6">
                    <div class="flex flex-col sm:flex-row sm:space-x-8">
                        <div class="flex flex-col w-full ">
                            <div class="my-6">
                                <h2 class="text-lg font-medium text-purple">Location</h2>
                                <p class="text-xs text-gray-400">{{ $note }}</p>
                            </div>
                            <div class=" flex flex-row space-x-8">
                                <div class=" flex flex-row items-center">
                                    <x-jet-label for="place_business" value="{{ __('Place of business') }}" />
                                    <x-jet-input wire:click="dropOffPlace('business')" id="place_business" name="place" type="radio" class="ml-4" value="" />    
                                </div>
                                
                                 <div class=" flex flex-row items-center">
                                    <x-jet-label for="place_knutsford" value="{{ __('Knutsford Express Office') }}" />
                                    <x-jet-input wire:click="dropOffPlace('knutsford')" id="place_knutsford" name="place" type="radio" class="ml-4" value="" />    
                                </div>
                            </div>
                            <!-- Business -->
                            @if($dropoff_place == 'business')
                            <div class="w-full">
                                <x-jet-label for="business_name" value="{{ __('Name of business') }}" />
                                <x-jet-input name="business_name" type="text" class="mt-1 block w-full" wire:model.defer="business_name" />
                                <x-jet-input-error for="business_name" class="mt-2" />
                            </div>
                            @endif

                            @if($dropoff_place == 'knutsford')
                            <!-- Branch -->
                            <div class="flex flex-col sm:flex-row sm:space-x-8 my-6" >
                                <div class="w-full">
                                    <x-jet-label for="knutsford_office" value="{{ __('Branch') }}"/>
                                    <select name="knutsford_office" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" autocomplete="delivery_knutsford_branch" wire:model.defer="knutsford_office">
                                        <option value="" disabled selected> Branch Location</option>
                                        <option value="new_kingston">New Kingston</option>
                                        <option value="souverign">Souverign</option>
                                        <option value="portmore">Portmore</option>
                                        <option value="angels" >Angles St. Catherine</option>
                                    </select>
                                    <x-jet-input-error for="knutsford_office" class="mt-2" />
                                </div>
                                <div class="w-full">
                                    <x-jet-label for="knutsford_receipt_number" value="{{ __('Receipt number') }}" />
                                    <x-jet-input name="knutsford_receipt_number" type="text" class="mt-1 block w-full" wire:model.defer="knutsford_receipt_number" />
                                    <x-jet-input-error for="knutsford_receipt_number" class="mt-2" />
                                </div>
                            </div> 
                            <div class=" flex flex-row items-center">
                                <x-jet-input wire:click="knutsford_paid" name="knutsford_paid" type="checkbox" class="mr-4" wire:model.defer="knutsford_paid"/> 
                                <x-jet-label for="knutsford_paid" value="{{ __('My Knutsford fees are already paid') }}" />
                            </div>
                            @endif

                            @if($dropoff_place != 'knutsford')
                            <!-- Address Street & number -->
                            <div class="w-full">
                                <x-jet-label for="address" value="{{ __('Address') }}" />
                                <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="delivery_address" />
                                <x-jet-input-error for="address" class="mt-2" />
                            </div>
                            <!-- community -->
                            <div class="w-full">
                                <x-jet-label for="community" value="{{ __('Community, town, etc.') }}" />
                                <x-jet-input id="community" type="text" class="mt-1 block w-full" wire:model.defer="delivery_community" />
                                <x-jet-input-error for="community" class="mt-2" />
                            </div>
                            <div class="w-full">
                                    <x-jet-label for="parish" value="{{ __('Parish') }}"/>
                                    <select name="parish" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" autocomplete="parish">
                                        <option value="" disabled selected>Select a parish</option>
                                        <option value="kingston" @if($parish == 'kingston') selected @endif>Kingston</option>
                                        <option value="st_andrew" @if($parish == 'st_andrew') selected @endif>St. Andrew</option>
                                        <option value="st_catherine" @if($parish =='st_catherine') selected @endif>St. Catherine</option>
                                        <option value="clarendon" @if($parish == 'clarendon') selected @endif>Clarendon</option>
                                        <option value="st_ann" @if($parish == 'st_ann') selected @endif>St. Ann</option>
                                        <option value="manchester" @if($parish == 'manchester') selected @endif>Manchester</option>
                                        <option value="st_elizabeth" @if($parish == 'st_elizabeth') selected @endif>St. Elizabeth</option>
                                        <option value="westmoreland" @if($parish == 'westmoreland') selected @endif>Westmoreland</option>
                                        <option value="st_james" @if($parish == 'st_james') selected @endif>St. James</option>
                                        <option value="falmouth" @if($parish == 'falmouth') selected @endif>Falmouth</option>
                                        <option value="port_antonio" @if($parish == 'port_antonio') selected @endif>Port Antonio</option>
                                        <option value="st_thomas" @if($parish == 'st_thomas') selected @endif>St. Thomas</option>
                                    </select>
                                    <x-jet-input-error for="status" class="mt-2" />
                            </div>
                            @endif
                            <div class="my-6">
                                <x-jet-button class="justify-center w-full">
                                    {{ __('Verify Drop-off Location ') }}
                                </x-jet-button>  
                            </div>
                        </div>    
                    </div>
                </div>
            </form>
        @endif

        @if($tab == 'recipient')
            <form wire:submit.prevent="setDeliveryAddress">
                <div class="bg-gray-50 px-6">
                    <div class="flex flex-col sm:flex-row sm:space-x-8">
                        <div class="flex flex-col w-full ">
                            <div class="flex flex-col w-full">
                            <div class="my-6">
                                <h2 class="text-lg font-medium text-purple">Contact Info</h2>
                                <p class="text-xs text-gray-400">Who's sending?</p>
                            </div>
                            <div class="w-full">
                                <x-jet-label for="first_name" value="{{ __('First name') }}" />
                                <x-jet-input  name="first_name" type="text" class="mt-1 block w-full"  wire:model.defer="recipient.first_name"/>
                                <x-jet-input-error for="first_name" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-jet-label for="last_name" value="{{ __('Last name') }}" />
                                <x-jet-input  name="last_name" type="text" class="mt-1 block w-full" wire:model.defer="recipient.last_name" />
                                <x-jet-input-error for="last_name" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-jet-label for="phone" value="{{ __('Contact number') }}" />
                                <x-jet-input  name="phone" type="text" class="mt-1 block w-full" value="" wire:model.defer="recipient.phone"/>
                                <x-jet-input-error for="phone" class="mt-2" />
                            </div>
                            <div class="w-full">
                                <x-jet-label for="email" value="{{ __('Email address') }}" />
                                <x-jet-input  name="email" type="email" class="mt-1 block w-full" wire:model.defer="recipient.email" />
                                <x-jet-input-error for="email" class="mt-2" />
                            </div>
                        </div>
                           
                            <div class="my-6">
                                <x-jet-button class="justify-center w-full">
                                    {{ __('Save') }}
                                </x-jet-button>  
                            </div>
                        </div>    
                    </div>
                </div>
            </form>
        @endif

    </div>
</div>