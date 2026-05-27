<div class="tabs-card">

    <div class="tabs-layout">

        <!-- MENU TABS -->
        <nav class="tabs-menu">
            <button
                class="tabs-menu-item {{ $activeTab === 'profile' ? 'is-active' : '' }}"
                wire:click="setTab('profile')"
                type="button"
            >
                <i class="las la-user tabs-icon"></i>
                <span class="tabs-label">Profil</span>
            </button>

            <button
                class="tabs-menu-item {{ $activeTab === 'roles' ? 'is-active' : '' }}"
                wire:click="setTab('roles')"
                type="button"
            >
                <i class="las la-tasks tabs-icon"></i>
                <span class="tabs-label">Roles</span>
            </button>
            
            <button
                class="tabs-menu-item {{ $activeTab === 'activites' ? 'is-active' : '' }}"
                wire:click="setTab('activites')"
                type="button"
            >
                <i class="la la-users"></i>
                <span class="tabs-label">Activités</span>
            </button>
        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'profile')
                <div class="tab-panel">
                    @livewire('profile')
                </div>
            @endif

            @if($activeTab === 'activites')
                <div class="tab-panel">
                    @livewire('activity-index')
                </div>
            @endif

            @if($activeTab === 'roles')
                <div class="tab-panel">
                    @livewire('roles-crud')
                </div>
            @endif
        </section>

    </div>

</div>
