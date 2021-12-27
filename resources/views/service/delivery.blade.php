<x-app-layout>
    <div class="flex flex-col mx-auto">
        <div class="flex flex-col sm:justify-center sm:pt-0 w-full py-6 dark:border-gray-700">
            <div class="pt-6 text-3xl font-bold text-gray-700">
                Delivery Services  
            </div>
            <div class="text-sm my-2 ">
                Enter the details of the package you want to create.
            </div>
            <div class="flex flex-row w-full">
                @livewire('service.create-service')
            </div>
        </div>
    </div>    
</x-app-layout>
