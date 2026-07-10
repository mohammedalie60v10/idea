
@props(['label','name','type' => 'text'])
<div class="space-y-2">
    <label for="{{$name}}" class="label">{{$label}}</label>
    <input type="{{$type}}" class="input" id="{{$name}}" name="{{$name}}" value="{{old($name)}}" {{$attributes}}>

    @error($name)
    <p class="mt-1 text-red-500">{{$message}}</p>
    @enderror
</div>
