<x-app-layout>
    <x-slot name="header">
        {{$package->ground_tracking}} 
    </x-slot>
    <div class="flex flex-col mx-auto ">
        <div class="flex flex-col sm:justify-start sm:pt-0 w-full">
            <div class="flex flex-col sm:flex-row pt-6 text-lg font-bold text-gray-700 justify-between">
                
                <div class="">
                  <a href="/admin/package/{{$package->id}}/edit" class="test-black-900 font-medium rounded-md text-sm bg-primaryyellow py-1 px-4 ">
                  Pay Now
                  </a>
                </div>
                <div class="my-2">
                  <a href="/admin/package/{{$package->id}}/edit" class="text-indigo-600">
                  <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 45 45" height="16px" id="Layer_1" version="1.1" viewBox="0 0 45 45" width="16px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><rect fill="#5e17eb" height="23" transform="matrix(-0.7071 -0.7072 0.7072 -0.7071 38.2666 48.6029)" width="11" x="23.7" y="4.875"/><path d="M44.087,3.686l-2.494-2.494c-1.377-1.377-3.61-1.377-4.987,0L34.856,2.94l7.778,7.778l1.749-1.749   C45.761,7.593,45.465,5.063,44.087,3.686z" fill="#5e17eb"/><polygon fill="#5e17eb" points="16,22.229 16,30 23.246,30  "/><path d="M29,40H5V16h12.555l5-5H3.5C1.843,11,0,11.843,0,13.5v28C0,43.156,1.843,45,3.5,45h28   c1.656,0,2.5-1.844,2.5-3.5V23.596l-5,5V40z" fill="#5e17eb"/></g></svg>
                  </a>
                </div>
            </div>
            <div class="text-sm mt-4">
                Review the complete details of your package travel history.
            </div>
        </div>
        <div class="">
            <div class="w-full">
                <div class="mb-6">
                    <h4 class="text-gray-700 font-bold">Travel History</h4>
                </div>
                <div class="my-12">
                <ul>
                    @foreach ($package->updates as $update)
                        <li class="sm:inline-block">
                            <div class="">
                                <div class="text-xs ml-4 sm:ml-0">
                                    <span class="font-medium"> {{ ucwords(preg_replace('/_/',' ', @$update->status))}} in </span>{{ ucwords(preg_replace('/_/',' ', @$update->location))}}
                                    <div class="text-xm sm:hidden ">
                                    <span class="">{{ ucwords(preg_replace('/_/',' ', @$update->created_at))}}</span> 
                                    </div>
                                </div>
                                <div class="flex sm:flex-row sm:items-center my:0 sm:my-2 mx-auto">
                                    <div class="rounded-lg bg-primarygreen w-3 h-3 ">
                                      
                                    </div>
                                    @if($package->latestUpdate->status !== $update->status)
                                      <div class="bg-primarygreen w-1 h-24 sm:w-48 sm:h-1 -mx-2">
                                           
                                      </div>
                                    @endif
                                    @if(($package->latestUpdate->status == $update->status) && ($update->status !== 'delivered'))
                                      <div class="bg-gray-400 w-1 h-24 sm:w-48 sm:h-1 -mx-2 ">
                                      
                                      </div>
                                      <div class="rounded-lg bg-gray-400 w-3 h-3">
                                    
                                      </div>
                                    @endif
                                </div>
                                
                                <div class="text-xs hidden sm:inline-block">
                                   <span class="">{{ ucwords(preg_replace('/_/',' ', @$update->created_at))}}</span> 
                                </div>
                            </div>
                        </li>
                    @endforeach    
                </ul>
              </div>
            </div>

            <div class="mt-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white overflow-hidden ">
                  <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                      Shipping Information
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                      Personal details and application.
                    </p>
                  </div>
                  <div class="border-t border-indigo-600">
                    <dl>
                      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          DPL Tracking Number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          {{@$package->ground_tracking}}
                        </dd>
                      </div>
                      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Current Status 
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          <x-status-span status="{{@$package->latestUpdate->status}}">{{ ucwords(preg_replace('/_/',' ', @$package->latestUpdate->status))}}</x-status-span>
                        </dd>
                      </div>
                      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          {{ucwords($package->courier)}} Tracking Number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          {{@$package->tracking_number}}
                        </dd>
                      </div>
                      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Weight
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          {{@$package->weight}} pounds
                        </dd>
                      </div>
                      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Shipper
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          {{@$package->shipper}}
                        </dd>
                      </div>
                      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Cost
                        </dt>
                        <dd class="mt-1 text-sm text-indigo-600 font-medium sm:mt-0 sm:col-span-2">
                          $ {{@$package->declared_value}}
                        </dd>
                      </div>
                      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Contents
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                         {{@$package->description}}
                        </dd>
                      </div>
                      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                          Attachments
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                              <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: solid/paper-clip -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 flex-1 w-0 truncate">
                                  resume_back_end_developer.pdf
                                </span>
                              </div>
                              <div class="ml-4 flex-shrink-0">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                  Upload Invoice
                                </a>
                              </div>
                            </li>
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                              <div class="w-0 flex-1 flex items-center">
                                <!-- Heroicon name: solid/paper-clip -->
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 flex-1 w-0 truncate">
                                  coverletter_back_end_developer.pdf
                                </span>
                              </div>
                              <div class="ml-4 flex-shrink-0">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                  Download Receipt
                                </a>
                              </div>
                            </li>
                          </ul>
                        </dd>
                      </div>
                    </dl>
                  </div>
                </div>

            </div>
        </div>
    </div>    
</x-app-layout>
