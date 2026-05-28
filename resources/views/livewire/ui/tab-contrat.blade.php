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
                    class="tabs-menu-item {{ $activeTab === 'Contrat' ? 'is-active' : '' }}"
                    wire:click="setTab('Contrat')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Contrat</span>
            </button>


            
            <button
                    class="tabs-menu-item {{ $activeTab === 'Renouvellements' ? 'is-active' : '' }}"
                    wire:click="setTab('Renouvellements')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Renouvellements</span>
            </button>

        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'home')
                <div class="tab-panel">
                    
                </div>
            @endif

            @if($activeTab === 'Contrat')
                <div class="tab-panel">
                    
                </div>
            @endif

            @if($activeTab === 'Renouvellements')
                <div class="tab-panel">
                    
                </div>
            @endif

        </section>

    </div>

</div>
