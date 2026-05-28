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
                    class="tabs-menu-item {{ $activeTab === 'Planning des Missions' ? 'is-active' : '' }}"
                    wire:click="setTab('Planning des Missions')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Planning des Missions</span>
            </button>

                        <button
                    class="tabs-menu-item {{ $activeTab === 'Affectation' ? 'is-active' : '' }}"
                    wire:click="setTab('Affectation')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Affectation des Agents</span>
            </button>

                        <button
                    class="tabs-menu-item {{ $activeTab === 'Suivi des Missions' ? 'is-active' : '' }}"
                    wire:click="setTab('Suivi des Missions')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Suivi des Missions</span>
            </button>

        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'home')
                <div class="tab-panel">
                    
                </div>
            @endif

            @if($activeTab === 'Planning des Missions')
                <div class="tab-panel">
                    
                </div>
            @endif

        </section>

    </div>

</div>
