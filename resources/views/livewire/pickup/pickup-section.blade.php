<div>
    <form wire:submit.prevent="setPickupAddress">
        <div class="bg-gray-50 px-6">
            <div class="flex flex-col sm:flex-row sm:space-x-8">
                <div class="flex flex-col w-full ">
                    <div class="my-6">
                        <h2 class="text-lg font-medium text-purple">Location</h2>
                        <p class="text-xs text-gray-400">{{ $note }}</p>
                    </div>
                    <div class=" flex  flex-col sm:flex-row sm:space-x-8">
                        <div class="flex flex-row items-center">
                            <x-jet-label for="pickup_place_residence" value="{{ __('Place of residence') }}" />
                            <x-jet-input wire:click="setPlace('residence')" value="residence" name="place" type="radio" class="ml-4" wire:model.defer="place" />    
                        </div>
                        <div class="flex flex-row items-center">
                            <x-jet-label for="pickup_place_business" value="{{ __('Place of business') }}" />
                            <x-jet-input wire:click="setPlace('business')" value="business" name="place" type="radio" class="ml-4" wire:model.defer="place"/>    
                        </div>

                         <div class=" flex flex-row items-center">
                            <x-jet-label for="pickup_place_knutsford" value="{{ __('Knutsford Express Office') }}" />
                            <x-jet-input wire:click="setPlace('knutsford')" value="knutsford" name="place" type="radio" class="ml-4" wire:model.defer="place" />   
                        </div>
                    </div>
                    <!-- Business -->
                    @if($place == 'business')
                    <div class="w-full">
                        <x-jet-label for="business_name" value="{{ __('Name of business') }}" />
                        <x-jet-input name="business_name" type="text" class="mt-1 block w-full" wire:model.defer="pickup_address.business_name" autocomplete="business_name" />
                        <x-jet-input-error for="business_name" class="mt-2" />
                    </div>
                    @endif
                    @if($place == 'knutsford')
                    <!-- Branch -->
                    <div class="flex flex-col sm:flex-row sm:space-x-8 my-6" >
                        <div class="w-full">
                            <x-jet-label for="knutsford_office" value="{{ __('Branch') }}"/>
                            <select name="knutsford_office" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" autocomplete="knutsford_office" wire:model.defer="pickup_address.knutsford_office"> 

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
                            <x-jet-input name="knutsford_receipt_number" type="text" class="mt-1 block w-full" wire:model.defer="pickup_address.knutsford_receipt_number" />
                            <x-jet-input-error for="knutsford_receipt_number" class="mt-2" autocomplete="knutsford_receipt_number"/>
                        </div>
                    </div> 
                    <div class=" flex flex-row items-center">
                        <x-jet-input name="knutsford_paid" type="checkbox" class="mr-4" wire:model.defer="pickup_address.knutsford_paid" autocomplete="knutsford_paid" /> 
                        <x-jet-label for="knutsford_paid" value="{{ __('My Knutsford fees are already paid') }}" />
                    </div>
                    @endif

                    @if(($place == 'residence') || ($place == 'business'))
                    <!-- Address Street & number -->
                    <div class="w-full">
                        <x-jet-label for="address" value="{{ __('Address') }}" />
                        <x-jet-input type="text" class="mt-1 block w-full" id="address" wire:model.defer="pickup_address.address"/>
                        <x-jet-input-error for="address" class="mt-2" />
                    </div>
                    <!-- community -->
                    <div class="w-full">
                        <x-jet-label for="community" value="{{ __('Community, town, etc.') }}" />
                        <x-jet-input id="community" type="text" class="mt-1 block w-full" wire:model.defer="pickup_address.community" />
                        <x-jet-input-error for="community" class="mt-2" />
                    </div>
                    <div class="w-full">
                            <x-jet-label for="parish" value="{{ __('Parish') }}"/>
                            <select wire:model.defer="pickup_address.parish" name="parish" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" autocomplete="pickup_address.parish">
                                <option value="" disabled selected>Select a parish</option>
                                <option value="kingston" >Kingston</option>
                                <option value="st_andrew" >St. Andrew</option>
                                <option value="st_catherine" >St. Catherine</option>
                                <option value="clarendon" >Clarendon</option>
                                <option value="st_ann" >St. Ann</option>
                                <option value="manchester" >Manchester</option>
                                <option value="st_elizabeth" >St. Elizabeth</option>
                                <option value="westmoreland" >Westmoreland</option>
                                <option value="st_james" >St. James</option>
                                <option value="falmouth" >Falmouth</option>
                                <option value="port_antonio">Port Antonio</option>
                                <option value="st_thomas">St. Thomas</option>
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
</div>


  <div>
                <label for="from-city" class="block text-black-500 mt-3">From Community</label>
                <select id="from-city" class="mt-2 w-full border rounded-md p-1 focus:outline-none @error('from_city')border-red-500 @else border-indigo-500 @endif" wire:model="from_city">
                    <option value="">--</option>
                    @foreach($from_communities as $community)
                        <option value="{{ $community['id'] }}">{{ $community['name'] }}</option>
                    @endforeach
                </select>
                @error('from_community')
                <div class="mt-1 text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>