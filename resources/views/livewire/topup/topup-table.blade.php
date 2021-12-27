<div class="mx-auto flex flex-col">
  <div class="flex inline-flex justify-between w-full items-center">
    <h2 class="font-medium text-lg">{{ $heading }}</h2>
    <div class="space-x-2">
      <a href="" class="text-xs text-purple hover:underline" wire:click.prevent="ncb">NCB</a>
      <a href="" class="text-xs text-purple hover:underline" wire:click.prevent="bns">BNS</a>
      <a href="" class="text-xs text-purple hover:underline" wire:click.prevent="jnb">JNB</a>
    </div>
  </div>
  <x-jet-section-border/>
    <div class=" w-full bg-gray-100 mt-4">
      <div class="col-span-12">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 ">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Tansaction No.
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Requested On
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      By User
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      To Add
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Paid To Bank
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Dated
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Status
                    </th>
                    <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Edit
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200  text-xs">
                  @foreach($topups as $topup)
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <a href="" class="hover:underline text-indigo-600" >{{ @$topup->transaction_number }}</a>    
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                          {{ $topup->created_at }} 
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-col items-center">
                          <div class="text-sm font-medium text-gray-900">
                            {{ $topup->user->first_name.' '.$topup->user->last_name }} 
                          </div>
                          <div class="text-sm text-gray-500">
                            <a href="" class="text-purple">{{ $topup->user->email }} </a>  
                          </div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        $ {{ @$topup->amount_to_be_added }} 
                      </td>
                       <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ ucwords(preg_replace('/_/',' ', @$topup->bank_account))}}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{ @$topup->date_of_transaction }}
                      </td> 
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <x-topup-status-span status="{{$topup->status}}">
                          {{ ucwords($topup->status)}}
                        </x-topup-status-span>
                      </td>
                      <td class="px-2 py-4 text-sm font-medium">
                        <a href="/admin/topup/{{$topup->id}}/edit">
                          <span class="">
                              <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg class="h-4 w-4" enable-background="new 0 0 45 45" height="16px" id="Layer_1" version="1.1" viewBox="0 0 45 45" width="16px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><rect fill="#5e17eb" height="23" transform="matrix(-0.7071 -0.7072 0.7072 -0.7071 38.2666 48.6029)" width="11" x="23.7" y="4.875"/><path d="M44.087,3.686l-2.494-2.494c-1.377-1.377-3.61-1.377-4.987,0L34.856,2.94l7.778,7.778l1.749-1.749   C45.761,7.593,45.465,5.063,44.087,3.686z" fill="#5e17eb"/><polygon fill="#5e17eb" points="16,22.229 16,30 23.246,30  "/><path d="M29,40H5V16h12.555l5-5H3.5C1.843,11,0,11.843,0,13.5v28C0,43.156,1.843,45,3.5,45h28   c1.656,0,2.5-1.844,2.5-3.5V23.596l-5,5V40z" fill="#5e17eb"/></g></svg>
                          </span>
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
</div>

