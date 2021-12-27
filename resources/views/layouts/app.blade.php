<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Drop Pac') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('extra_css')

        @livewireStyles

        <!-- Scripts -->
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
         @yield('extra_js')
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <div class="grid grid-cols-6">
            @includeWhen(session()->has('status'),'flash-banner')
                <div class="col-span-6">                            
                    <div class="my-auto grid grid-cols-3 gap-2 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white"> 
                                              
                    </div>
                    <!-- Page Content -->
                    <div class="max-w-7xl mx-auto sm:phx-6 lg:px-8">
                        <div class="bg-white overflow-hidden shfadow-xl sm:rounlded-lg min-h-screen px-6 sm:px-8 py-12 mb-4">
                            <!-- status menu -->
                            @if (isset($statuses))

                                {{ $statuses }}

                             @endif  
                            <!-- Page Heading -->
                            @if (isset($header))
                                <header class="font-medium text-2xl my-8 border-b pb-8 border-gray-200 dark:border-gray-700 ">
                                    <h2 class="col-span-1 text-gray-800 leading-tight">
                                        {{ $header }}
                                    </h2>
                                </header>
                             @endif    
                            <main class="">
                                {{ $slot }}
                            </main>
                        </div>
                    </div> 
                </div>
            </div>      
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
