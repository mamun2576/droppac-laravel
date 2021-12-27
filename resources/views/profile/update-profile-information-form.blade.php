<div class="text-sm font-medium flex flex-col justify-left">
    <h1 class=" text-xl font-bold text-gray-600">Account</h1>
     <x-jet-section-border />
    <div class="flex flex-col sm:flex-row my-6 text-lg font-bold text-gray-600"> 
        <div class="mr-8">
            <h4 class="text-lg text-gray-700 font-medium">Profile Information</h4>
            <p class="text-xs font-normal text-gray-400"> 
                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
            </p> 
        </div>
    </div> 
    <form wire:submit.prevent="updateProfileInformation">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="">
                <x-jet-label for="photo" value="{{ __('Photo') }}" />
                <div class="flex flex-row inline justify-left items-center mb-6">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <!-- Current Profile Photo -->
                    <div class="mt-2 mr-8" x-show="! photoPreview">
                        <img src="{{ $this->user->profile_photo_url}}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 mr-8" x-show="photoPreview">
                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2 h-8" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Upload') }}
                    </x-jet-secondary-button>

                    @if ($this->user->profile_photo_path)
                        <x-jet-secondary-button type="button" class="mt-2 mr-2 h-8" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-jet-secondary-button>
                    @endif

                    <x-jet-input-error for="photo" class="mt-2" />
                </div>

                <div class=" flex flex-col sm:flex-row w-full inline justify-left sm:space-x-8 mb-6"> 
                    <!-- First Name -->
                    <div class="w-full">
                        <x-jet-label for="first_name" value="{{ __('First name') }}" />
                        <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="state.first_name" autocomplete="first_name" />
                        <x-jet-input-error for="first_name" class="mt-2" />
                    </div>
                    <!-- Last Name -->
                    <div class="w-full">
                        <x-jet-label for="last_name" value="{{ __('Last name') }}" />
                        <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name" autocomplete="last_name" />
                        <x-jet-input-error for="last_name" class="mt-2" />
                    </div>
                </div>
                <div class="py-8 flex flex-col">
                    <h1 class=" text-lg font-medium text-gray-700">Personal Information</h1>
                    <p class="text-xs font-normal text-gray-400"> 
                        or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
                    </p>
                </div>
                <div class=" flex flex-col sm:flex-row w-full inline justify-left sm:space-x-8">
                     <!-- Email -->
                    <div class="w-full">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
                        <x-jet-input-error for="email" class="mt-2" />
                    </div>
                    <!-- Phone -->
                    <div class="w-full">
                        <x-jet-label for="phone" value="{{ __('Phone number') }}" />
                        <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone" autocomplete="phone" />
                        <x-jet-input-error for="phone" class="mt-2" />
                    </div>
                </div>
                <div class=" flex flex-col sm:flex-row w-full inline justify-left sm:space-x-8">
                     <!-- Address Strees & number -->
                    <div class="w-full">
                        <x-jet-label for="address" value="{{ __('Address') }}" />
                        <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" />
                        <x-jet-input-error for="address" class="mt-2" />
                    </div>
                    <!-- Phone -->
                    <div class="w-full">
                        <x-jet-label for="apartment" value="{{ __('Apartment, suite, etc.') }}" />
                        <x-jet-input id="apartment" type="text" class="mt-1 block w-full" wire:model.defer="state.apartment" autocomplete="apartment" />
                        <x-jet-input-error for="apartment" class="mt-2" />
                    </div>
                </div>
                <div class=" flex flex-col sm:flex-row w-full inline justify-left sm:space-x-8 ">
                     <!-- Community -->
                    <div class="w-full">
                        <x-jet-label for="community" value="{{ __('Community, town, etc.') }}" />
                        <x-jet-input id="community" type="text" class="mt-1 block w-full" wire:model.defer="state.community" />
                        <x-jet-input-error for="community" class="mt-2" />
                    </div>
                    <!-- Parish -->
                    <div class="w-full">
                        <x-jet-label for="parish" value="{{ __('Parish') }}"/>
                        <select name="parish" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.parish" autocomplete="parish">
                            <option value="" disabled selected>Select your parish</option>
                            <option value="kingston" @if(@$user->parish == 'kingston') selected @endif>Kingston</option>
                            <option value="st_andrew" @if(@$user->parish == 'st_andrew') selected @endif>St. Andrew</option>
                            <option value="st_catherine" @if(@$user->parish == 'st_catherine') selected @endif>St. Catherine</option>
                            <option value="clarendon" @if(@$user->parish == 'clarendon') selected @endif>Clarendon</option>
                            <option value="st_ann" @if(@$user->parish == 'st_ann') selected @endif>St. Ann</option>
                            <option value="manchester" @if(@$user->parish == 'manchester') selected @endif>Manchester</option>
                            <option value="st_elizabeth" @if(@$user->parish == 'st_elizabeth') selected @endif>St. Elizabeth</option>
                            <option value="westmoreland" @if(@$user->parish == 'westmoreland') selected @endif>Westmoreland</option>
                            <option value="st_james" @if(@$user->parish == 'st_james') selected @endif>St. James</option>
                            <option value="falmouth" @if(@$user->parish == 'falmouth') selected @endif>Falmouth</option>
                            <option value="port_antonio" @if(@$user->parish == 'port_antonio') selected @endif>Port Antonio</option>
                            <option value="st_thomas" @if(@$user->parish == 'st_thomas') selected @endif>St. Thomas</option>
                        </select>
                        <x-jet-input-error for="status" class="mt-2" />
                    </div>
                </div>
            </div>
        @endif
        <x-jet-button class="">
            {{ __('Save') }}
        </x-jet-button>  
    </form>   
</div>
