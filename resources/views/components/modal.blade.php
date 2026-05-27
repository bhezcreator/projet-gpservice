@props([
    'title' => 'Modal',
    'size' => 'xl', // sm | md | xl | fullscreen
])

@php
    $sizes = [
        'sm' => 'modal-sm',
        'md' => 'modal-md',
        'xl' => 'modal-xl',
        'fullscreen' => 'modal-fullscreen',
    ];
@endphp

<div
    x-data="{ open: @entangle($attributes->wire('model')) }"
    x-show="open"
    x-transition.opacity
    x-on:keydown.escape.window="open = false"
    class="modal-overlay"
    style="display: none;"
>
    <!-- Overlay -->
    <div class="modal-backdrop" 
    {{-- @click="open = false" --}}
    ></div>

    <!-- Modal -->
    <div class="modal-container {{ $sizes[$size] ?? 'modal-xl' }}" @click.stop>
        <div class="modal-header">
            <h3>{{ $title }}</h3>
            <button class="modal-close" @click="$wire.set('{{ $attributes->wire('model')->value() }}', false)">
                ✕
            </button>

        </div>

        <div class="modal-body">
            {{ $slot }}
        </div>

        @isset($footer)
        <div class="modal-footer">
            {{ $footer }}
        </div>
        @endisset
    </div>
</div>
