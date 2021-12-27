<div class="" :packages="packages" x-data="{show:true}">
  <div class="flex inline-flex justify-between w-full items-center">
    <h2 class="font-medium text-lg">{{ $heading }}</h2>
    <div class="space-x-2">
      <a href="admin/package/create" class="text-xs text-indigo-600 hover:underline">Add new package</a>
      <a href="" class="text-xs text-indigo-600 hover:underline" wire:click.prevent="domestic">Domestic</a>
      <a href="" class="text-xs text-indigo-600 hover:underline" wire:click.prevent="international">International</a>
    </div>
  </div>
  <x-jet-section-border/>
  <div class="w-full inline mb-4" >
    <button @click="show = ! show" class="bg-gray-50 w-full inline-flex justify-between p-2 rounded-sm text-gray-400"><h4 class="text-sm font-medium text-gray-700">Filter by status</h4>
      <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#5e17eb">
          <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
      </svg>
    </button>
  </div>
  <div x-show="show" class="flex flex-col sm:justify-center sm:pt-0 w-full mt-8 mb-4 sm:flex-row text-xs items-right font-medium sm:space-x-2">
    @if ($statusCount['courier_requested'] > 0)
        <x-status-counter status="{{ $statusCount['courier_requested'] }}" base="red" wire:click.prevent="getPackagesByStatus('courier_requested')">Courier Requests</x-status-counter>
    @endif
    @if ($statusCount['picked_up'] > 0)
        <x-status-counter status="{{ $statusCount['picked_up'] }}" base="blue" wire:click.prevent="getPackagesByStatus('picked_up')">Picked Up</x-status-counter>
    @endif
    @if ($statusCount['at_facility'] > 0)
        <x-status-counter status="{{ $statusCount['at_facility'] }}" base="gray" wire:click.prevent="getPackagesByStatus('at_facility')">At Facility</x-status-counter>
    @endif
    @if ($statusCount['in_transit'] > 0)
         <x-status-counter status="{{ $statusCount['in_transit'] }}" base="yellow" wire:click.prevent="getPackagesByStatus('in_transit')">In Transit</x-status-counter>
    @endif
    @if ($statusCount['out_for_delivery'] > 0)
        <x-status-counter status="{{ $statusCount['out_for_delivery'] }}" base="indigo" wire:click.prevent="getPackagesByStatus('out_for_delivery')">Out For Delivery</x-status-counter>
    @endif
    @if ($statusCount['delivered'] > 0)
        <x-status-counter status="{{ $statusCount['delivered'] }}" base="green" wire:click.prevent="getPackagesByStatus('delivered')">Delivered</x-status-counter>
    @endif      
  </div>
  
   <div class=" w-full bg-gray-100 mt-4 text-xs">
     <div class="col-span-12">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Shipper
                    </th>  
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      User
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Tracking Number
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Weight
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Cost
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Edit
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      DEL
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($packages as $package)
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          <a href="">{{ $package->shipper }} </a>
                        </td>  
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $package->user->first_name }} {{ $package->user->last_name }} 
                              </div>
                              <div class="text-sm text-gray-500">
                                <a href="" class="hover:underline text-indigo-600">{{ $package->user->email }} </a>  
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                         @if(isset($package->ground_tracking))
                          <div class="text-sm text-gray-500">
                              <a href="/admin/package/{{$package->id}}" class="hover:underline text-indigo-600">{{$package->ground_tracking}}</a> 
                          </div> 
                          @else
                          <div class="text-sm text-gray-900">
                             <a href="/admin/package/{{$package->id}}" class="hover:underline text-indigo-600">{{$package->tracking_number}} </a>  
                          </div>
                          @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <x-status-span status="{{@$package->latestUpdate->status}}">{{ ucwords(preg_replace('/_/',' ', @$package->latestUpdate->status))}}</x-status-span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ @$package->weight}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          $ 29.00
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                          <a href="/admin/package/{{$package->id}}/edit" class="text-indigo-600 hover:text-indigo-100 ">
                              <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 45 45" height="16px" id="Layer_1" version="1.1" viewBox="0 0 45 45" width="16px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><rect fill="#5e17eb" height="23" transform="matrix(-0.7071 -0.7072 0.7072 -0.7071 38.2666 48.6029)" width="11" x="23.7" y="4.875"/><path d="M44.087,3.686l-2.494-2.494c-1.377-1.377-3.61-1.377-4.987,0L34.856,2.94l7.778,7.778l1.749-1.749   C45.761,7.593,45.465,5.063,44.087,3.686z" fill="#5e17eb"/><polygon fill="#5e17eb" points="16,22.229 16,30 23.246,30  "/><path d="M29,40H5V16h12.555l5-5H3.5C1.843,11,0,11.843,0,13.5v28C0,43.156,1.843,45,3.5,45h28   c1.656,0,2.5-1.844,2.5-3.5V23.596l-5,5V40z" fill="#5e17eb"/></g></svg>
                          </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          <a href="/admin/package/{{$package->id}}/edit" class="text-indigo-600 hover:text-indigo-100 ">
                            <svg viewBox="0 0 30 30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M19.71 26h-9.42a2 2 0 0 1-1.988-1.779L6.5 8h17l-1.802 16.221A2 2 0 0 1 19.71 26zM24 6H6a1 1 0 0 1 0-2h18a1 1 0 0 1 0 2z" fill="#ff0000" class="fill-000000"></path><path d="M18 5h-6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1z" fill="#ff0000" class="fill-000000"></path></svg>
                          </a>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>