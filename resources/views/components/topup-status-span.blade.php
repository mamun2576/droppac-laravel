@props(['status'])
  @php
  switch ($status) {
      case 'cancelled':
          $color = 'text-red-800 bg-red-100';
          break;
      case 'processing':
          $color = 'text-orange-800 bg-orange-100';
          break;
      case 'rollback':
          $color = 'text-gray-800 bg-gray-100';
          break;  
      case 'approved':
      default:
          $color = 'text-green-800 bg-green-100';
          break;
  }
@endphp
    <span {!! $attributes->merge(['class' => 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full '.$color]) !!}
     >
      {{ $slot }}
    </span>
