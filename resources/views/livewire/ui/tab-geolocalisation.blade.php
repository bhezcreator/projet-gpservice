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
                    class="tabs-menu-item {{ $activeTab === 'Carte des Agents' ? 'is-active' : '' }}"
                    wire:click="setTab('Carte des Agents')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Carte des Agents</span>
            </button>

                        <button
                    class="tabs-menu-item {{ $activeTab === 'Historique' ? 'is-active' : '' }}"
                    wire:click="setTab('Historique')"
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
                    <p>Suivi Temps Réel</p>
                </div>
            @endif

            @if($activeTab === 'agents-externes')
                <div class="tab-panel">
                    
                </div>
            @endif

        </section>

    </div>

</div>
