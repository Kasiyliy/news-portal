@csrf
@foreach($elements as $key => $element)
    @if($element['type'] == 'select')
        <x-select-form-group :name="$key"
                             :placeholder="$element['placeholder']"
                             :label="$element['label']"
                             :errors="$errors"
                             :options="$element['options']"
                             :required="array_key_exists('required', $element) && $element['required']"
                             :type="$element['type']"/>
    @else
        <x-input-form-group :name="$key"
                            :errors="$errors"
                            :placeholder="$element['placeholder']"
                            :label="$element['label']"
                            :value="$element['value']"
                            :required="array_key_exists('required', $element) && $element['required']"
                            :type="$element['type']"/>
    @endif
@endforeach