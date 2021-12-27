<div class="text-sm font-medium flex flex-col justify-left">
    <h1 class=" text-lg font-bold text-gray-600">U.S Mailing Address</h1>
    <x-jet-section-border />
    <div class="flex flex-col sm:flex-row my-6"> 
        <div class="mr-8">
            <h4>U.S Mailing Address For Shipping By Air</h4>
            <p class="text-xs font-normal text-gray-400"> 
                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
            </p> 
        </div>
        <div class="h-48">
            <h4>U.S Address: Shipping by sea</h4>  
            <p class="text-xs font-normal text-gray-400"> 
                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
            </p> 
            <div class="flex flex-col my-6">
                <div class="flex flex-row inline justify-left items-center">
                    <h5 class="font-medium text-gray-500 mr-4">Name:</h5>
                    <p class="text-sm font-normal text-gray-500">{{$seamail['name']}}</p>
                </div>
                <div class="flex flex-row inline justify-left items-center">
                    <h5 class="font-medium text-gray-500 mr-4">Address Line 1:</h5>
                    <p class="text-sm font-normal text-gray-500">{{$seamail['line1']}}</p>
                </div>
                <div class="flex flex-row inline justify-left items-center">
                    <h5 class="font-medium text-gray-500 mr-4">Address Line 2:</h5>
                    <p class="text-sm font-normal text-gray-500">{{$seamail['line2']}}</p>
                </div>
                <div class="flex flex-row inline justify-left items-center">
                    <h5 class="font-medium text-gray-500 mr-4">City:</h5>
                    <p class="text-sm font-normal text-gray-500">{{$seamail['city']}}</p>
                </div>
                <div class="flex flex-row inline justify-left items-center">
                    <h5 class="font-medium text-gray-500 mr-4">State:</h5>
                    <p class="text-sm font-normal text-gray-500">{{$seamail['state']}}</p>
                </div>
                <div class="flex flex-row inline justify-left items-center">
                    <h5 class="font-medium text-gray-500 mr-4">Zip Code:</h5>
                    <p class="text-sm font-normal text-gray-500">{{$seamail['zipcode']}}</p>
                </div>
            </div>    
        </div>
    </div>    
</div>
