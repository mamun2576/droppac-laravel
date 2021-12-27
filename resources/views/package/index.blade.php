<x-app-layout>
    <x-slot name="header">
        {{__('All Packages')}}
    </x-slot>
    <div class="flex flex-col mx-auto ">
        <x-slot name="statuses">
            <div class="flex flex-col sm:justify-center sm:pt-0 w-full my-8 sm:flex-row text-sm items-right font-medium text-md">
                <a href="{{route('create.package')}}" class="py-1 bg-transparent rounded-full text-white mr-4 w-full "> 
                  <div class="inline-flex overflow-hidden w-full">
                    <div class="bg-red-100 px-4 rounded-sm w-full">
                      <h4 class="text-red-900 my-2">Courier Requested</h4>
                    </div>
                    <div class="bg-red-900 w-1/4 px-2">
                      <h4 class="text-white my-2">0</h4>
                    </div>
                  </div>
                </a>
                <a href="{{route('create.package')}}" class="py-1 bg-transparent rounded-full text-white mr-4 w-full "> 
                  <div class="inline-flex overflow-hidden w-full">
                    <div class="bg-blue-100 px-4 rounded-sm w-full">
                      <h4 class="text-blue-900 my-2">Picked Up</h4>
                    </div>
                    <div class="bg-blue-900 w-1/4 px-2">
                      <h4 class="text-white my-2">0</h4>
                    </div>
                  </div>
                </a>
                <a href="{{route('create.package')}}" class="py-1 bg-transparent rounded-full text-white mr-4 w-full "> 
                  <div class="inline-flex overflow-hidden w-full">
                    <div class="bg-gray-100 px-4 rounded-sm w-full">
                      <h4 class="text-gray-900 my-2 ">At Facility</h4>
                    </div>
                    <div class="bg-gray-900 w-1/4 px-2">
                      <h4 class="text-white my-2">0</h4>
                    </div>
                  </div>
                </a>
                <a href="{{route('create.package')}}" class="py-1 bg-transparent rounded-full text-white mr-4 w-full "> 
                  <div class="inline-flex overflow-hidden w-full">
                    <div class="bg-yellow-100 px-4 rounded-sm w-full">
                      <h4 class="text-yellow-600 my-2">In transit</h4>
                    </div>
                    <div class="bg-yellow-600 w-1/4 px-2">
                      <h4 class="text-white my-2">0</h4>
                    </div>
                  </div>
                </a>
                <a href="{{route('create.package')}}" class="py-1 bg-transparent rounded-full text-white mr-4 w-full "> 
                  <div class="inline-flex overflow-hidden w-full">
                    <div class="bg-indigo-100 px-4 rounded-sm w-full">
                      <h4 class="text-indigo-600 my-2">Out For Delivery</h4>
                    </div>
                    <div class="bg-indigo-600 w-1/4 px-2">
                      <h4 class="text-white my-2">0</h4>
                    </div>
                  </div>
                </a>
                <a href="{{route('create.package')}}" class="py-1 bg-transparent rounded-full text-white"> 
                  <div class="inline-flex overflow-hidden w-full">
                    <div class="bg-green-100 px-4 rounded-sm w-full">
                      <h4 class="text-green-600 my-2">Delivered</h4>
                    </div>
                    <div class="bg-green-600 w-1/4 px-2">
                      <h4 class="text-white my-2">0</h4>
                    </div>
                  </div>
                </a>
            </div>
        </x-slot>
        <div class=" w-full bg-gray-100 ">
           <div class="col-span-12">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shaDDdow overflow-hidden border-b border-gray-200 sm:rohunded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Shipper
                          </th>  
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Account Number
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
                            Update
                          </th>
                          <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
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
                                      <a href="" class="underline text-purple">{{ $package->user->email }} </a>  
                                    </div>
                                  </div>
                                </div>
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap">

                               @if(isset($package->ground_tracking))
                                <div class="text-sm text-gray-500">
                                    <a href="/admin/package/{{$package->id}}" class="underline text-purple">{{$package->ground_tracking}}</a> 
                                </div> 
                                @else
                                <div class="text-sm text-gray-900">
                                   <a href="/admin/package/{{$package->id}}" class="underline text-purple">{{$package->tracking_number}} </a>  
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
                            </tr>
                        @endforeach
                        <!-- More people... -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>    
</x-app-layout>
