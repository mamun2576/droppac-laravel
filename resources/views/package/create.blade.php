<x-app-layout>
    <div class="flex flex-col mx-auto ">
        <div class="flex flex-col sm:justify-start sm:pt-0 w-full p-6 dark:border-gray-700">
            <div class="pt-6 text-lg font-bold text-gray-700">
                Create a package    
            </div>
            <div class="text-sm my-2 ">
                Enter the details of the package you want to create.
            </div>
        </div>
        <div class=" w-full bg-gray-100 p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 ">
            <div class="w-full">
                <form method="POST" action="{{ route('store.package') }}">
                    @csrf
                    @include('package.form')
                </form>
            </div>
        </div>
    </div>    
</x-app-layout>
