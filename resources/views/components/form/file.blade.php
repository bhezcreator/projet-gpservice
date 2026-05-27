@props([
    'label' => null,
    'name' => null,
    'accept' => null,
])

@php
    // Détecter le champ si name non fourni
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
        type="file"
        id="{{ $field }}"
        name="{{ $field }}"
        {{ $accept ? "accept=$accept" : '' }}
        {{ $attributes }}
    >

    @if($field)
        @error($field)
            <small class="error-text">{{ $message }}</small>
        @enderror
    @endif
</div>
