<div class="w-full">
    <form class="mt-2" wire:submit.prevent="createHandling">
        @csrf
        <div class="flex flex-col">
            <div class="my-6">
                <h2 class="text-lg font-medium text-purple">Create a new special handling</h2>
                <p class="text-xs text-gray-400">Complete and submit the form below to create a special handling.</p>
            </div>
            <div class="flex flex-col sm:flex-row sm:space-x-8">
                <div class="w-full">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name"  type="text" class="mt-1 block w-full" name="name"  wire:model.defer="name" autocomplete="name"/>
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-jet-label for="note" value="{{ __('Note') }}" />
                    <textarea  id="delivery_time" name="note" class="mt-1 w-full border-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadsow-sm" wire:model.defer="note" autocomplete="note"></textarea>
                    <x-jet-input-error for="note" class="mt-2" />
                </div>
                <div class="w-full">
                    <x-jet-label for="cost" value="{{ __('Cost of service') }}" />
                    <x-jet-input  id="cost" name=cost type="number" class="mt-1 block w-full" wire:model.defer="cost" autocomplete="cost"/>
                    <x-jet-input-error for="cost" class="mt-2" />
                </div>
            </div>
            <div class="mt-6">
                <div class="w-full">
                    
                </div>
                <x-jet-button class="justify-end">
                    {{ __('Create') }}
                </x-jet-button>  
            </div>
        </div>
   </form>
   <div class="mt-8">
        <div class="my-6">
            <h2 class="text-lg font-medium text-purple">Available Special Handling Services</h2>
        </div>
       <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
              </th>  
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Note
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Cost(JMD)
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Edit
              </th>
            </tr>
          </thead>
          <tbody class="bg-gray-100 divide-y divide-gray-200">
            @foreach($handlings as $handle)
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <a href="">{{ $handle->name }} </a>
                  </td> 
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="">{{ $handle->note }} </a>
                  </td> 
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <p>{{ $handle->cost }} </p>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="" class="text-indigo-600 hover:text-indigo-100 ">
                        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg enable-background="new 0 0 45 45" height="16px" id="Layer_1" version="1.1" viewBox="0 0 45 45" width="16px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><rect fill="#5e17eb" height="23" transform="matrix(-0.7071 -0.7072 0.7072 -0.7071 38.2666 48.6029)" width="11" x="23.7" y="4.875"/><path d="M44.087,3.686l-2.494-2.494c-1.377-1.377-3.61-1.377-4.987,0L34.856,2.94l7.778,7.778l1.749-1.749   C45.761,7.593,45.465,5.063,44.087,3.686z" fill="#5e17eb"/><polygon fill="#5e17eb" points="16,22.229 16,30 23.246,30  "/><path d="M29,40H5V16h12.555l5-5H3.5C1.843,11,0,11.843,0,13.5v28C0,43.156,1.843,45,3.5,45h28   c1.656,0,2.5-1.844,2.5-3.5V23.596l-5,5V40z" fill="#5e17eb"/></g></svg>
                    </a>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
   </div>
</div>
