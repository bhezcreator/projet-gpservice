<div class="tabs-card">

    <div class="tabs-layout">

        <!-- MENU TABS -->
        <nav class="tabs-menu">
  {{--           <button
                class="tabs-menu-item {{ $activeTab === 'donors' ? 'is-active' : '' }}"
                wire:click="setTab('donors')"
                type="button"
            >
                <i class="la la-money-bill"></i>
                <span class="tabs-label">Donateurs</span>
            </button>
 --}}
            <button
                class="tabs-menu-item {{ $activeTab === 'budget' ? 'is-active' : '' }}"
                wire:click="setTab('budget')"
                type="button"
            >
                <i class="la la-money-bill"></i>
                <span class="tabs-label">Budget</span>
            </button>
        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

{{--             @if($activeTab === 'donors')
                <div class="tab-panel">
                    @livewire('donors-crud')
                </div>
            @endif --}}

            @if($activeTab === 'budget')
                <div class="tab-panel">
                    @livewire('hr-budgets-crud')
                </div>
            @endif

        </section>

    </div>

</div>
