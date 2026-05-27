<div class="tabs-card">

    <div class="tabs-layout">

        <!-- MENU TABS -->
        <nav class="tabs-menu">
            <button
                class="tabs-menu-item {{ $activeTab === 'trainings' ? 'is-active' : '' }}"
                wire:click="setTab('trainings')"
                type="button"
            >
                <i class="las la-graduation-cap tabs-icon"></i>
                <span class="tabs-label">Formations</span>
            </button>

            <button
                class="tabs-menu-item {{ $activeTab === 'evaluation' ? 'is-active' : '' }}"
                wire:click="setTab('evaluation')"
                type="button"
            >
                <i class="las la-check tabs-icon"></i>
                <span class="tabs-label">Evaluations</span>
            </button>
        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'trainings')
                <div class="tab-panel">
                    @livewire('trainings-crud')
                </div>
            @endif

            @if($activeTab === 'evaluation')
                <div class="tab-panel">
                    @livewire('evaluations-crud')
                </div>
            @endif

        </section>

    </div>

</div>
