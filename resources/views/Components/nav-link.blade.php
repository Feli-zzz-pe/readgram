@props(['active' => false]) , 

@php
    
@endphp


<a class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 text-sm font-medium" 
   aria-current="{{ $active ? 'page' : 'false' }}"
   {{ $attributes }}
>{{ $slot }}</a>
