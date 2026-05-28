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
                    class="tabs-menu-item {{ $activeTab === 'Stocks' ? 'is-active' : '' }}"
                    wire:click="setTab('Stocks')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Stocks</span>
            </button>

                        <button
                    class="tabs-menu-item {{ $activeTab === 'Demandes' ? 'is-active' : '' }}"
                    wire:click="setTab('Demandes')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Demandes</span>
            </button>

            <button
                    class="tabs-menu-item {{ $activeTab === 'Attributions' ? 'is-active' : '' }}"
                    wire:click="setTab('Attributions')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Attributions</span>
            </button>
        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'home')
                <div class="tab-panel">
                    
                </div>
            @endif

            @if($activeTab === 'agents-externes')
                <div class="tab-panel">
                    
                </div>
            @endif

        </section>

    </div>

</div>
