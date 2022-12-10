@props(['name', 'value'=>null, 'label'=>'','class' => '' ])
@php
    $invalidClass =$errors->has(dotted_string($name)) ? 'is-invalid' : '';
    $splitAttributes = explode(' ',$attributes);
    $properties = [
    'class'=>"{$invalidClass} custom-control-input ".$class ,
    ...$splitAttributes,
    'id'=>'toggle_'.dotted_string($name)
    ];
    $value ??= data_get(Form::getModel(),dotted_string($name))
@endphp
<div class="d-flex {{ $class }}">
    <label for="{{ 'toggle_'.dotted_string($name) }}"
           class="mr-4 cursor-pointer text-left {{ $errors->has(dotted_string($name)) ? 'text-danger' : '' }}">
        {{ $label }}
    </label>
    <div
        class="custom-control custom-switch custom-switch-square custom-control-secondary mb-2">
        <input type="hidden" name="{{ $name }}" value="0">
        {!! Form::checkbox($name,1,(int)$value === 1,$properties) !!}
        <label for="{{ 'toggle_'.dotted_string($name) }}"
               class="custom-control-label"></label>
        @error(dotted_string($name))
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

</div>
