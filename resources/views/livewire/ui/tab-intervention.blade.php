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
                    class="tabs-menu-item {{ $activeTab === 'Validation' ? 'is-active' : '' }}"
                    wire:click="setTab('Validation')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Validation</span>
            </button>

                        <button
                    class="tabs-menu-item {{ $activeTab === 'Rapports' ? 'is-active' : '' }}"
                    wire:click="setTab('Rapports')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Rapports</span>
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
                    
                </div>
            @endif

            @if($activeTab === 'Validation')
                <div class="tab-panel">
                    
                </div>
            @endif

        </section>

    </div>

</div>
