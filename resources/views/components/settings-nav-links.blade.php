@props(['name','message'])
<div class="" {{ $attributes->merge(['class' => 'class',]) }}>
    <a href="">
        <div class="px-4 hover:bg-gray-50 flex flex-row inline justify-left pw-full borber border-b border-gray-200 py-6">
            {{ $slot }}
            <div class="flex flex-col">
                <h4>{{ $name }}</h4>
                <p class="text-xs font-normal text-gray-400"> 
                    {{ $message }}
                </p>    
            </div>
        </div>
    </a>
</div>