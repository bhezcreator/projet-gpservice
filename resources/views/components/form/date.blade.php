@props([
    'label' => null,
    'name' => null,
    'value' => null,
])

@php
    // Détecter le champ si name n'est pas fourni
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
        type="date"
        id="{{ $field }}"
        name="{{ $field }}"
        value="{{ old($field, $value) }}"
        {{ $attributes }}
    >

    @if($field)
        @error($field)
            <small class="error-text">{{ $message }}</small>
        @enderror
    @endif
</div>
