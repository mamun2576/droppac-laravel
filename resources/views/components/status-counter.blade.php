@props(['status','base',])
  <a href="#" {!! $attributes->merge(['class' => 'py-1 bg-transparent rounded-full justist-start w-full',]) !!}> 
    <div class="inline-flex w-full ">
      <div class="{{'bg-'.$base.'-100'}} px-4 w-full">
        <h4 class="{{'text-'.$base.'-900'}} my-2">{{ $slot }}</h4>
      </div>
      <div class=" w-2/5 px-2 {{'bg-'.$base.'-600'}}">
        <h4 class="text-center text-white my-2">{{ $status }}</h4>
      </div>
    </div>
  </a>
