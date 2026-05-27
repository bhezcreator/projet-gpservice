@props([
    'title' => 'Confirmation',
    'message' => 'Êtes-vous sûr ?',
    'confirmText' => 'Confirmer',
    'cancelText' => 'Annuler',
    'size' => 'sm',
])

<x-modal {{ $attributes }} :title="$title" :size="$size">
    <div class="confirm-body">
        <div class="confirm-icon">⚠️</div>
        <p>{{ $message }}</p>
    </div>

    <x-slot name="footer">
        <button
            class="btn btn-outline mx-1"
            @click="$wire.set('{{ $attributes->wire('model')->value() }}', false)"
        >
            {{ $cancelText }}
        </button>

        <button class="btn btn-danger" wire:click="confirm">
            {{ $confirmText }}
        </button>
    </x-slot>
</x-modal>
