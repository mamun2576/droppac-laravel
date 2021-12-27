<div class="text-sm font-medium flex flex-col justify-left">
    <h1 class=" text-xl font-bold text-gray-600">Security</h1>
    <x-jet-section-border />
    <div class="flex flex-col sm:flex-row my-6 text-lg font-bold text-gray-600"> 
        <div class="mr-8">
            <h4 class="text-lg font-medium text-gray-700">Update Password</h4>
            <p class="text-xs font-normal text-gray-400"> 
                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
            </p> 
        </div>
    </div> 
    <form wire:submit.prevent="updatePassword">
       <div class="">
            <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>
        <div class="">
            <x-jet-label for="password" value="{{ __('New Password') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>
        <div class="">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </form>   
</div>


