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
                    class="tabs-menu-item {{ $activeTab === 'Prospects' ? 'is-active' : '' }}"
                    wire:click="setTab('Prospects')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Prospects</span>
            </button>

                        <button
                    class="tabs-menu-item {{ $activeTab === 'Demandes de Services' ? 'is-active' : '' }}"
                    wire:click="setTab('Demandes de Services')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Demandes de Services</span>
            </button>

                                    <button
                    class="tabs-menu-item {{ $activeTab === 'Devis' ? 'is-active' : '' }}"
                    wire:click="setTab('Devis')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Devis</span>
            </button>

                                                <button
                    class="tabs-menu-item {{ $activeTab === 'Factures' ? 'is-active' : '' }}"
                    wire:click="setTab('Factures')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Factures</span>
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

            @if($activeTab === 'Prospects')
                <div class="tab-panel">
                    
                </div>
            @endif

        </section>

    </div>

</div>
