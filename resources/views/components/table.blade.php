@props([
    'title' => null,
    'subtitle' => null,
])

<div class="ui-table">
    {{-- Header --}}
    @if($title || $subtitle)
        <div class="ui-table__header">
            <div>
                @if($title)
                    <h2 class="ui-table__title">{{ $title }}</h2>
                @endif
                @if($subtitle)
                    <p class="ui-table__subtitle">{{ $subtitle }}</p>
                @endif
            </div>

            @isset($actions)
                <div class="ui-table__actions">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    @endif

    {{-- Table --}}
    <div class="ui-table__wrapper">
        <table class="ui-table__table">
            <thead class="ui-table__thead">
                <tr>
                    {{ $head }}
                </tr>
            </thead>

            <tbody class="ui-table__tbody">
                {{ $slot }}
            </tbody>
        </table>
    </div>

    {{-- Footer --}}
    @isset($footer)
        <div class="ui-table__footer">
            {{ $footer }}
        </div>
    @endisset
</div>
