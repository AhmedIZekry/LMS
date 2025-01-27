<div class="mb-3">
    <label class="form-check form-switch">
        <input class="form-check-input" name="{{$name}}" type="checkbox" value="1" @checked($checked)>
        <span class="form-check-label">{{$label}}</span>
    </label>
    <x-input-error :messages="$errors->get($name)" class="mt-2"/>
</div>
