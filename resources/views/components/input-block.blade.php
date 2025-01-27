<div class="mb-3">
    <label class="form-label">{{$label}}</label>
    <input type="text" class="form-control" name="{{$name}}" value="{{$value}}"
           placeholder="{{$placeHolder}}">
    <x-input-error :messages="$errors->get($name)" class="mt-2"/>
</div>

