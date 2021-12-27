@props(['status'])
  @php
  switch ($status) {
      case 'courier_requested':
          $color = 'text-red-800 bg-red-100';
          break;
      case 'picked_up':
          $color = 'text-indigo-800 bg-indigo-100';
          break;
      case 'at_facility':
          $color = 'text-gray-800 bg-gray-100';
          break;
      case 'ready_for_delivery':
          $color = 'text-yellow-800 bg-yellow-100';
          break;
      case 'out_for_delivery':
          $color = 'text-orange-800 bg-orange-100';
          break;    
      case 'delivered':
      default:
          $color = 'text-green-800 bg-green-100';
          break;
  }
@endphp
    <span {!! $attributes->merge(['class' => 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full '.$color]) !!}
     >
      {{ $slot }}
    </span>
