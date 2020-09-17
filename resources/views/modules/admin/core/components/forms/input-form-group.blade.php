<div class="form-group {{$required ? ' required' : ''}}">
    <label class="control-label" for="{{$name}}">{{$label}}</label>
    <input name="{{$name}}"
           id="{{$name}}"
           class="form-control{{ isset($errors) && $errors->has($name) ? ' is-invalid' : '' }}"
           value="{{ isset($value) ? $value : old($name) }}" {{$required ? ' required' : ''}}
           type="{{$type}}" placeholder="{{$placeholder}}"
           @if($type == 'date') max='2000-01-01' @endif
           @if($type == 'file') accept="image/*" {{$multiple ? ' multiple' : ''}} @endif>
    @if (isset($errors) && $errors->has($name))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>
