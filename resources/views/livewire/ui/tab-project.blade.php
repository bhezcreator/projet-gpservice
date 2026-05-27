<div class="tabs-card">

    <div class="tabs-layout">

        <!-- MENU TABS -->
        <nav class="tabs-menu">
            <button
                class="tabs-menu-item {{ $activeTab === 'projects' ? 'is-active' : '' }}"
                wire:click="setTab('projects')"
                type="button"
            >
                <i class="las la-tasks tabs-icon"></i>
                <span class="tabs-label">Projets</span>
            </button>

            <button
                class="tabs-menu-item {{ $activeTab === 'activites' ? 'is-active' : '' }}"
                wire:click="setTab('activites')"
                type="button"
            >
                <i class="las la-tasks tabs-icon"></i>
                <span class="tabs-label">Activités</span>
            </button>
            
            <button
                class="tabs-menu-item {{ $activeTab === 'donors' ? 'is-active' : '' }}"
                wire:click="setTab('donors')"
                type="button"
            >
                <i class="la la-users"></i>
                <span class="tabs-label">Donateurs</span>
            </button>
        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'projects')
                <div class="tab-panel">
                    @livewire('project-index')
                </div>
            @endif

            @if($activeTab === 'activites')
                <div class="tab-panel">
                    @livewire('activity-index')
                </div>
            @endif

            @if($activeTab === 'donors')
                <div class="tab-panel">
                    @livewire('donors-crud')
                </div>
            @endif
        </section>

    </div>

</div>
