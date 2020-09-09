<div class="form-group {{$required ? ' required' : ''}}">
    <label class="control-label">{{$label}}</label>
    <input name="{{$name}}"
           class="form-control{{ isset($errors) && $errors->has($name) ? ' is-invalid' : '' }}"
           value="{{ isset($value) ? $value : old($name) }}" {{$required ? ' required' : ''}}
           type="{{$type}}" placeholder="{{$placeholder}}">
    @if (isset($errors) && $errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>