<div class="tabs-card">

    <div class="tabs-layout">

        <!-- MENU TABS -->
        <nav class="tabs-menu">
            <button
                    class="tabs-menu-item {{ $activeTab === 'home' ? 'is-active' : '' }}"
                    wire:click="setTab('home')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Accueil</span>
            </button>

            <button
                    class="tabs-menu-item {{ $activeTab === 'Utilisateurs' ? 'is-active' : '' }}"
                    wire:click="setTab('Utilisateurs')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Utilisateurs</span>
            </button>

                        <button
                    class="tabs-menu-item {{ $activeTab === 'Journal Activités' ? 'is-active' : '' }}"
                    wire:click="setTab('Journal Activités')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Journal d’Activités</span>
            </button>

            <button
                    class="tabs-menu-item {{ $activeTab === 'Configurations' ? 'is-active' : '' }}"
                    wire:click="setTab('Configurations')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Configurations</span>
            </button>

            <button
                    class="tabs-menu-item {{ $activeTab === 'Audit Système' ? 'is-active' : '' }}"
                    wire:click="setTab('Audit Système')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Audit Système</span>
            </button>

            <button
                    class="tabs-menu-item {{ $activeTab === 'Sauvegardes' ? 'is-active' : '' }}"
                    wire:click="setTab('Sauvegardes')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Sauvegardes</span>
            </button>

                        <button
                class="tabs-menu-item {{ $activeTab === 'roles' ? 'is-active' : '' }}"
                wire:click="setTab('roles')"
                type="button"
            >
                <i class="las la-tasks tabs-icon"></i>
                <span class="tabs-label">Roles</span>
            </button>

        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'home')
                <div class="tab-panel">
                    
                </div>
            @endif

            @if($activeTab === 'Utilisateurs')
                <div class="tab-panel">
                    
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
