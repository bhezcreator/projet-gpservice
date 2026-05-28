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
                <span class="tabs-label">Statistiques Globales</span>
            </button>

            <button
                    class="tabs-menu-item {{ $activeTab === 'Missions' ? 'is-active' : '' }}"
                    wire:click="setTab('Missions')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Missions</span>
            </button>

                        <button
                    class="tabs-menu-item {{ $activeTab === 'Financiers' ? 'is-active' : '' }}"
                    wire:click="setTab('Financiers')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Financiers</span>
            </button>
                                    <button
                    class="tabs-menu-item {{ $activeTab === 'Rapports RH' ? 'is-active' : '' }}"
                    wire:click="setTab('Rapports RH')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Rapports RH</span>
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
                    class="tabs-menu-item {{ $activeTab === 'Clients' ? 'is-active' : '' }}"
                    wire:click="setTab('Clients')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Clients</span>
            </button>

        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'home')
                <div class="tab-panel">
                    
                </div>
            @endif

            @if($activeTab === 'Missions')
                <div class="tab-panel">
                    
                </div>
            @endif

        </section>

    </div>

</div>
