@props(['name'])

@error($name)
<p class="text-red-500 font-bold text-xs">{{ $message }}</p>
    
@enderror