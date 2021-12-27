<x-app-layout>
    <x-slot name="header">
        {{ __('Package') }}
    </x-slot>
    <div class="flex flex-col mx-auto ">
        <div class="flex flex-col sm:justify-start sm:pt-0 w-full p-6 ">
            <div class="pt-6 text-lg font-bold text-gray-700">
                Updating package <a class="text-purple font-normal underline" href="{{'/admin/package/'.$package->id}}">{{$package->tracking_number}}</a>
            </div>
            <div class="text-sm my-2">
                Updates made to the status of the packages will be sent to owner at  <a href="" class="text-purple font-normal underline">{{$package->user->email }} </a>  .
            </div>
        </div>
        <div class=" w-full bg-gray-100 p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0">
            <div class="w-full">
                <form method="POST" action="{{ route('update.package') }}">
                    @csrf
                    @method('PATCH')
                    @include('package.form')
                </form>
            </div>
        </div>
    </div>    
</x-app-layout>