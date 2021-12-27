
    <div class="grid grid-cols-12 gap-6 mb-6">
         <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="status" value="{{ __('Current status') }}"/>
            <select name="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.status" autocomplete="status">
                <option value="" disabled selected>Select to update status</option>
                <option value="courier_requested" @if(@$package->latestUpdate->status == 'courier_requested') selected @endif>Courier Requested</option>

                <option value="picked_up"  @if(@$package->latestUpdate->status == 'picked_up')  selected @endif>Picked Up</option>
                <option value="in_transit" @if(@$package->latestUpdate->status == 'in_transit') selected @endif>In Transit</option>
                <option value="at_facility" @if(@$package->latestUpdate->status == 'at_facility') selected @endif>At facility</option>
                <option value="ready_for_delivery" @if(@$package->latestUpdate->status == 'ready_for_delivery') selected @endif>Ready for Delivery</option>
                <option value="out_for_delivery" @if(@$package->latestUpdate->status == 'out_for_delivery') selected @endif>Out for Delivery</option>
                <option value="delivered" @if(@$package->latestUpdate->status == 'delivered') selected @endif>Delivered</option>
            </select>
            <x-jet-input-error for="status" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-2 ">
            <x-jet-label for="account" value="{{ __('User account number') }}"/>
            <x-jet-input name="account" value="{{ old('account',@$package->account ? $package->account : '') }}" type="text" class="mt-1 block w-full" wire:model.defer="state.account" autocomplete="account" />
            <x-jet-input-error for="account" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-4 ">
            <x-jet-label for="tracking_number" value="{{ __('Domestic Tracking Number') }}"/>
            <x-jet-input name="ground_tracking" readoSSSnly value="{{ old('ground_tracking',isset($package->ground_tracking) ? $package->ground_tracking : '') }}" type="text" class="mt-1 block w-full" wire:model.defer="state.tracking_number" autocomplete="ground_tracking" readonly />
            <x-jet-input-error for="ground_tracking" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="tracking_number" value="{{ __('International Tracking Number') }}"/>
            <x-jet-input name="tracking_number" value="{{ old('tracking_number',isset($package->tracking_number) ? $package->tracking_number : '') }}" type="text" class="mt-1 block w-full" wire:model.defer="state.tracking_number" autocomplete="tracking_number" />
            <x-jet-input-error for="tracking_number" class="mt-2" />
        </div>
    </div> 
    <div class="grid grid-cols-12 gap-6 mb-6 ">
         <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="shipper" value="{{ __('Shipper') }}"/>
            <x-jet-input name="shipper" type="text" value="{{ old('shipper',isset($package->shipper) ? $package->shipper : '') }}" class="mt-1 block w-full" wire:model.defer="state.shipper" autocomplete="shipper" />
            <x-jet-input-error for="shipper" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-3">
            <x-jet-label for="courier" value="{{ __('Courier') }}"/>
            <x-jet-input name="courier" type="text" value="{{ old('courier',isset($package->courier) ? $package->courier : '') }}" class="mt-1 block w-full" wire:model.defer="state.courier" autocomplete="courier" />
            <x-jet-input-error for="courier" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="waybill" value="{{ __('Waybill') }}"/>
            <x-jet-input name="waybill" type="text" value="{{ old('waybill',isset($package->waybill) ? $package->waybill : '') }}" class="mt-1 block w-full" wire:model.defer="state.waybill" autocomplete="waybill" />
            <x-jet-input-error for="waybill" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="consignee" value="{{ __('Consignee') }}"/>
            <x-jet-input name="consignee" type="text" value="{{ old('consignee',isset($package->consignee) ? $package->consignee : '') }}" class="mt-1 block w-full" wire:model.defer="state.consignee" autocomplete="consignee" />
            <x-jet-input-error for="consignee" class="mt-2" />
        </div>
    </div> 
    <div class="grid grid-cols-12 gap-6 mb-6 ">
        <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="weight" value="{{ __('Weight (lbs)') }}"/>
            <x-jet-input name="weight" type="number" value="{{ old('weight',isset($package->weight) ? $package->weight : '') }}" min="0" step="0.01" class="mt-1 block w-full" wire:model.defer="state.weight" autocomplete="weight" />
            <x-jet-input-error for="weight" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="height" value="{{ __('Height (inch)') }}"/>
            <x-jet-input name="height" type="number" value="{{ old('height',isset($package->height) ? $package->height : '') }}" min="0" step="0.01" class="mt-1 block w-full" wire:model.defer="state.height" autocomplete="height" />
            <x-jet-input-error for="height" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="length" value="{{ __('Length (inch)') }}"/>
            <x-jet-input name="length" type="number" value="{{ old('length',isset($package->length) ? $package->length : '') }}" min="0" step="0.01" class="mt-1 block w-full" wire:model.defer="state.length" autocomplete="length" />
            <x-jet-input-error for="length" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="width" value="{{ __('Width (inch)') }}"/>
            <x-jet-input name="width" type="number" value="{{ old('width',isset($package->width) ? $package->width : '') }}" min="0" step="0.01" class="mt-1 block w-full" wire:model.defer="state.width" autocomplete="width" />
            <x-jet-input-error for="width" class="mt-2" />
        </div>
    </div> 
    <div class="grid grid-cols-12 gap-6 mb-6 ">
        <div class="col-span-12 sm:col-span-9 ">
            <x-jet-label for="description" value="{{ __('Description of content')}}"/>
            <x-jet-input name="description" type="text" value="{{ old('description',isset($package->description) ? $package->description : '') }}" class="mt-1 block w-full" wire:model.defer="state.description" autocomplete="description" />
            <x-jet-input-error for="description" class="mt-2" />
        </div>
        <div class="col-span-12 sm:col-span-3 ">
            <x-jet-label for="declared_value" value="{{ __('Declared value (JMD)')}}"/>
            <x-jet-input name="declared_value" type="number" value="{{ old('declared_value',isset($package->declared_value) ? $package->declared_value : '') }}" min="0" step="0.01" class="mt-1 block w-full" wire:model.defer="state.declared_value" autocomplete="declared_value" />
            <x-jet-input-error for="declared_value" class="mt-2" />
        </div>
    </div> 
     <div class="grid grid-cols-12 gap-6 mb-6 ">
        <div class="col-span-12 sm:col-span-12 ">
            <x-jet-label for="uuid" value="{{ __('UUID')}}"/>
            <x-jet-input name="uuid" type="text" value="{{ old('uuid',isset($package->uuid) ? $package->uuid : '') }}" class="mt-1 block w-full disabled" wire:model.defer="state.uuid" autocomplete="uuid" />
            <x-jet-input-error for="uuid" class="mt-2" />
        </div>
    </div> 

    <div class="grid grid-cols-12 gap-6 ">
        <div class="col-span-3 col-start-10 ">
            <x-jet-button class="w-full bg-indigo-600 text-center mt-4" wire:loading.disabled>
            {{ __('Save') }}
            </x-jet-button>
        </div>
    </div>
