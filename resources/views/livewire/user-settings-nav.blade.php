<div class="flex flex-row w-full">
    <div class="w-1/3 min-h-screen hidden sm:block mr-8 w-full">
        <div class="text-sm font-medium text-gray-700">
            <div class="py-4 border-b border-gray-200 bg-white">
                <h1 class="text-lg font-medium text-gray-700">Settings</h1>
            </div>
            <a href="" wire:click.prevent="showSettingsController('address')" wire:loading.attribute="disabled">
                <div class="px-4 hover:bg-gray-50 flex flex-row inline justify-left pw-full borber border-b border-gray-200 py-6 @if($tab =='address')bg-blue-50 hover:bg-blue-50 font-bold text-indigo-500 border-b border-indigo-500 @endif">
                    <div class="flex flex-row">
                        <span class="mr-4">
                           <svg class="h-6 w-6" id="Icons" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M16 25H2v-8c0-3.9 3.1-7 7-7h0c3.9 0 7 3.1 7 7v8zM23 10h0c3.9 0 7 3.1 7 7v8H16M9 10h14M13 25h6v6h-6z" fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" class="stroke-000000"></path><path fill="none" stroke="#6b7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M22 18V1h8v4h-6" class="stroke-000000"></path></svg>
                        </span> 
                        <div class="">    
                            <h4>U.S Mailing Address</h4>
                            <p class="text-xs font-normal text-gray-400"> 
                                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
                            </p> 
                        </div>   
                    </div>
                </div>
            </a>
            <a href="" wire:click.prevent="showSettingsController('account')">
                <div class="px-4 hover:bg-gray-50 flex flex-row inline justify-left pw-full borber border-b border-gray-200 py-6 @if($tab =='account') bg-blue-50 hover:bg-blue-50 @endif">
                    <div class="flex flex-row">
                        <span class="mr-4">
                           <svg class="h-6 w-6" viewBox="0 0 26 26" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M25 13c0-6.617-5.383-12-12-12S1 6.383 1 13c0 3.384 1.413 6.439 3.674 8.622a.732.732 0 0 0 .189.172C7.003 23.777 9.858 25 13 25s5.996-1.223 8.137-3.206a.732.732 0 0 0 .19-.172A11.957 11.957 0 0 0 25 13zM13 2.5c5.79 0 10.5 4.71 10.5 10.5 0 2.455-.853 4.71-2.27 6.5-.65-2.097-2.508-3.74-5.028-4.495a5.455 5.455 0 0 0 2.272-4.424c0-3.015-2.455-5.467-5.474-5.467s-5.474 2.452-5.474 5.467c0 1.82.899 3.43 2.272 4.424-2.52.756-4.377 2.398-5.028 4.496A10.44 10.44 0 0 1 2.5 13C2.5 7.21 7.21 2.5 13 2.5zm-3.974 8.08a3.974 3.974 0 0 1 7.948 0 3.974 3.974 0 0 1-7.948 0zM6.031 20.833c.225-2.75 3.141-4.785 6.969-4.785s6.744 2.035 6.97 4.785C18.112 22.486 15.675 23.5 13 23.5s-5.113-1.014-6.97-2.668z" fill="#6b7280" class="fill-1d1d1b"></path></svg>
                        </span> 
                        <div class="">    
                            <h4>Account</h4>
                            <p class="text-xs font-normal text-gray-400"> 
                                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
                            </p> 
                        </div>   
                    </div>
                </div>
            </a>

            <a href="" wire:click.prevent="showSettingsController('security')">
                <div class="px-4 hover:bg-gray-50 flex flex-row inline justify-left pw-full borber border-b border-gray-200 py-6 @if($tab =='security')bg-blue-50 hover:bg-blue-50  @endif">
                    <div class="flex flex-row">
                        <span class="mr-4">
                             <svg class="h-6 w-6" viewBox="0 0 1262 1710.258" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M1196.495 713.258H1090V459.592C1090 206.307 884.198.242 630.999.242 377.799.242 172 206.442 172 459.892v253.366H66.686C30.195 713.258 0 742.241 0 778.731v766.42c0 91.079 74.712 165.106 165.792 165.106h931.597c91.08 0 164.611-74.027 164.611-165.106v-766.42c0-36.49-29.015-65.473-65.505-65.473zM304 459.892c0-180.588 146.664-327.508 326.999-327.508C811.335 132.384 958 279.168 958 459.592v253.666H304V459.892zm826 1085.259c0 18.218-14.395 33.106-32.611 33.106H165.792c-18.216 0-33.792-14.889-33.792-33.106V845.258h998v699.893z" fill="#6b7280" class="fill-000000"></path><path d="M631 1409.707c36.491 0 66-29.58 66-66.071v-237.854c0-36.49-29.51-66.07-66-66.07-36.49 0-66 29.58-66 66.07v237.854c0 36.491 29.509 66.071 66 66.071z" fill="#6b7280" class="fill-000000"></path></svg>
                        </span>
                        <div class="">    
                            <h4>Security</h4>
                            <p class="text-xs font-normal text-gray-400"> 
                                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
                            </p> 
                        </div>   
                    </div>
                </div>
            </a>

            <a href="" wire:click.prevent="showSettingsController('wallet')">
                <div class="px-4 hover:bg-gray-50 flex flex-row inline justify-left pw-full borber border-b border-gray-200 py-6 @if($tab =='payment')bg-blue-50 hover:bg-blue-50 @endif">
                    <div class="flex flex-row">
                        <span class="mr-4">
                             <svg class="h-6 w-6" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path d="M24 29H8a5 5 0 0 1-5-5V10a1 1 0 0 1 1-1h20a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5ZM5 11v13a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3V14a3 3 0 0 0-3-3Z" fill="#6b7280" class="fill-000000"></path><path d="M26 11a1 1 0 0 1-1-1V7.25a2.33 2.33 0 0 0-.78-1.87 1.94 1.94 0 0 0-1.67-.32L5.78 8.87a1 1 0 0 0-.78 1 1 1 0 0 1-2 0 3 3 0 0 1 2.33-2.95l16.78-3.81a3.9 3.9 0 0 1 3.36.71A4.34 4.34 0 0 1 27 7.25V10a1 1 0 0 1-1 1ZM28 23h-7a4 4 0 0 1 0-8h7a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1Zm-7-6a2 2 0 0 0 0 4h6v-4Z" fill="#6b7280" class="fill-000000"></path></g><path d="M0 0h32v32H0z" fill="none"></path></svg>
                        </span>
                        <div class="">    
                            <h4>Wallet</h4>
                            <p class="text-xs font-normal text-gray-400"> 
                                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
                            </p> 
                        </div>   
                    </div>
                </div>
            </a>

            <a href="" wire:click.prevent="showSettingsController('notification')">
                <div class="px-4 hover:bg-gray-50 flex flex-row inline justify-left pw-full borber border-b border-gray-200 py-6 @if($tab =='notification')bg-blue-50 hover:bg-blue-50 @endif">
                    <div class="flex flex-row">
                        <span class="mr-4">
                             <svg class="h-6 w-6" data-name="Layer 1" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path d="m40.62 28.34-.87-.7a2 2 0 0 1-.75-1.56V18A15 15 0 0 0 26.91 3.29a3 3 0 0 0-5.81 0A15 15 0 0 0 9 18v8.08a2 2 0 0 1-.75 1.56l-.87.7a9 9 0 0 0-3.38 7V37a4 4 0 0 0 4 4h8.26a8 8 0 0 0 15.47 0H40a4 4 0 0 0 4-4v-1.64a9 9 0 0 0-3.38-7.02zM24 43a4 4 0 0 1-3.44-2h6.89A4 4 0 0 1 24 43zm16-6H8v-1.64a5 5 0 0 1 1.88-3.9l.87-.7A6 6 0 0 0 13 26.08V18a11 11 0 0 1 22 0v8.08a6 6 0 0 0 2.25 4.69l.87.7A5 5 0 0 1 40 35.36z" fill="#6b7280" class="fill-000000"></path></svg>
                        </span>
                        <div class="">    
                            <h4>Notifications</h4>
                            <p class="text-xs font-normal text-gray-400"> 
                                or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
                            </p> 
                        </div>   
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="px-12 py-12 w-full bg-gray-50 " wire:loading.class="bg-white-">
        @if ($tab == 'address')
            <div wire:loading class="text-2xl bg-blue-100 mx-auto justify-center text-indigo-500 absolute px-4">
                Retrieving.....
            </div>
            @livewire('america-address',['tab'=>$tab])
        @endif
        @if ($tab == 'account')
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div wire:loading class="text-2xl bg-blue-100 mx-auto justify-center text-indigo-500 px-4">
                    Retrieving.....
                </div>
                @livewire('profile.update-profile-information-form')
            @endif
        @endif
        @if ($tab == 'security')
            <div wire:loading class="text-2xl bg-blue-100 mx-auto justify-center text-indigo-500 px-4">
                Retrieving.....
            </div>
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
            @endif
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        @endif
         @if ($tab == 'wallet')
            <div wire:loading class="text-2xl bg-blue-100 mx-auto justify-center text-indigo-500 px-4">
                Retrieving.....
            </div>
            @livewire('wallet.wallet')
        @endif

    </div>
</div>

