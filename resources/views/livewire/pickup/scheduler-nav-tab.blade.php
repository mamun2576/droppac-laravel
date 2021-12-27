<div class="w-full float-left flex flex-col">
    <button wire:click.prevent ="$emit('change-tab','pickup')" class=" border-b border-gray-200 py-4 bg-gray-50 text-lg font-medium bg-gray-50 text-purple hover:bg-purple hover:text-white w-full">
        Pickup 
    </button>
    <button wire:click.prevent ="$emit('change-tab','dropoff')" class="border-b border-gray-200 py-4 text-lg font-medium text-purple hover:bg-purple hover:text-white w-full">
        Drop-off
    </button>
     <button wire:click.prevent ="setTab('recipient')" class="border-b border-gray-200 py-4 text-lg font-medium text-purple hover:bg-purple hover:text-white w-full">
        Recipient
    </button>
     <button wire:click.prevent ="setTab('package')" class="border-b border-gray-200 py-4 text-lg font-medium text-purple hover:bg-purple hover:text-white w-full">
        Packages
    </button>
     <button class="border-b border-gray-200 py-4 text-lg font-medium text-purple hover:bg-purple hover:text-white w-full">
        Services
    </button>
     <button class="border-b border-gray-200 py-4 text-lg font-medium text-purple hover:bg-purple hover:text-white w-full">
        Review
    </button>
     <button class="border-b border-gray-200 py-4 text-lg font-medium text-purple hover:bg-purple hover:text-white w-full">
        Checkout
    </button>
</div>