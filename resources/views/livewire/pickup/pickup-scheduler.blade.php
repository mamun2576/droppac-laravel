<div class="w-full wire:ignore">
    @if ($tab == 'pickup')
         @livewire('pickup.pickup-section',['pickup' => $pickup])
    @endif
     @if ($tab == 'dropoff')
         @livewire('pickup.dropoff-section')
    @endif
</div>
