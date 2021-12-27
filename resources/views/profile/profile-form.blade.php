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
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full h-20 w-20 object-cover">
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

            @if ($user->profile_photo_path)
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
            <h1 class=" text-lg font-medium text-gray-500">Personal Information</h1>
            <p class="text-xs font-normal text-gray-400"> 
                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
            </p>
        </div>
        <div class=" flex flex-col sm:flex-row w-full inline justify-left sm:space-x-8 mb-6">
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
         
        <p class="text-xs font-normal text-gray-400 my-4"> 
            or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
        </p>
        <div class=" flex flex-col sm:flex-row w-full inline justify-left sm:space-x-8 mb-6">
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
    </div>
@endif
<x-jet-button class="my-6">
    {{ __('Save') }}
</x-jet-button>
         
</form>