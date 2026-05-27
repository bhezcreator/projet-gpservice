@props([
    'type' => 'success', // success | error | info | warning
    'message' => '',
    'duration' => 3000,
])

@php
    $styles = [
        'success' => ['icon' => '✅', 'bg' => 'bg-success'],
        'error'   => ['icon' => '❌', 'bg' => 'bg-danger'],
        'info'    => ['icon' => 'ℹ️', 'bg' => 'bg-info'],
        'warning' => ['icon' => '⚠️', 'bg' => 'bg-warning'],
    ];

    $toast = $styles[$type] ?? $styles['info'];
@endphp

<div
    x-data="{ show: true }"
    x-show="show"
    x-init="setTimeout(() => show = false, {{ $duration }})"
    x-transition
    class="toast-notification {{ $toast['bg'] }}"
>
    <span class="me-2">{{ $toast['icon'] }}</span>
    <span>{{ $message }}</span>
</div>
