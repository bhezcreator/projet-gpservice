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
                    class="tabs-menu-item {{ $activeTab === 'Clients' ? 'is-active' : '' }}"
                    wire:click="setTab('Clients')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Clients</span>
            </button>

                        <button
                    class="tabs-menu-item {{ $activeTab === 'Réclamations' ? 'is-active' : '' }}"
                    wire:click="setTab('Réclamations')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Réclamations</span>
            </button>

                                    <button
                    class="tabs-menu-item {{ $activeTab === 'Historique des Prestations' ? 'is-active' : '' }}"
                    wire:click="setTab('Historique des Prestations')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Historique</span>
            </button>

        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'home')
                <div class="tab-panel">
                    
                </div>
            @endif

            @if($activeTab === 'Clients')
                <div class="tab-panel">
                    
                </div>
            @endif

        </section>

    </div>

</div>
