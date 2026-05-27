@props([
    'label' => null,
    'name' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => '',
])

@php
    // Si name n'est pas fourni, on le déduit depuis wire:model
    $model = $attributes->get('wire:model')
            ?? $attributes->get('wire:model.defer')
            ?? $attributes->get('wire:model.live');

    $field = $name ?? $model;
    $error = $field && $errors->has($field);
@endphp

<div class="form-group {{ $error ? 'is-error' : '' }}">
    @if($label)
        <label for="{{ $field }}">{{ $label }}</label>
    @endif

    <input
        type="{{ $type }}"
        id="{{ $field }}"
        name="{{ $field }}"
        value="{{ old($field, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes }}
    >

    @if($field)
        @error($field)
            <small class="error-text">{{ $message }}</small>
        @enderror
    @endif
</div>
