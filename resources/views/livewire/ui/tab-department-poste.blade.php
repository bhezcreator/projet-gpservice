<div class="tabs-card">

    <div class="tabs-layout">

        <!-- MENU TABS -->
        <nav class="tabs-menu">
            <button
                class="tabs-menu-item {{ $activeTab === 'departments' ? 'is-active' : '' }}"
                wire:click="setTab('departments')"
                type="button"
            >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Départements</span>
            </button>

            <button
                class="tabs-menu-item {{ $activeTab === 'postes' ? 'is-active' : '' }}"
                wire:click="setTab('postes')"
                type="button"
            >
                <i class="las la-user-tie tabs-icon"></i>
                <span class="tabs-label">Postes</span>
            </button>
        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'departments')
                <div class="tab-panel">
                    @livewire('department-index')
                </div>
            @endif

            @if($activeTab === 'postes')
                <div class="tab-panel">
                    @livewire('position-index')
                </div>
            @endif

        </section>

    </div>

</div>
