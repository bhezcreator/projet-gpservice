@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'selected' => null,
])

@php
    // Détecter le champ pour Livewire si name n'est pas fourni
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

    <select id="{{ $field }}" name="{{ $field }}" {{ $attributes }}>
        <option value="">-- Sélectionner --</option>
        @foreach($options as $key => $value)
            <option value="{{ $key }}" 
                {{ old($field, $selected) == $key ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>

    @if($field)
        @error($field)
            <small class="error-text">{{ $message }}</small>
        @enderror
    @endif
</div>
