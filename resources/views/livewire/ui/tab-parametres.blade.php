<div class="tabs-card">

    <div class="tabs-layout">

        <!-- MENU TABS -->
        <nav class="tabs-menu">
            <button
                class="tabs-menu-item {{ $activeTab === 'home' ? 'is-active' : '' }}"
                wire:click="setTab('home')"
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
                <span class="tabs-label">Autres</span>
            </button>
        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'home')
                <div class="tab-panel">
                    @livewire('profile')
                </div>
            @endif

            @if($activeTab === 'activites')
                <div class="tab-panel">
                    <p>
                        Informations Société
                        Paramètres Email
                        SMS & Notifications
                        Devise
                        Langues
                        Fuseaux Horaires
                        Préférences
                    </p>
                </div>
            @endif


        </section>

    </div>

</div>
