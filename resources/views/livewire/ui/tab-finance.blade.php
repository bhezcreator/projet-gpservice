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
                    class="tabs-menu-item {{ $activeTab === 'Budgets' ? 'is-active' : '' }}"
                    wire:click="setTab('Budgets')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Budgets</span>
            </button>

            <button class="tabs-menu-item {{ $activeTab === 'Transactions' ? 'is-active' : '' }}"
                    wire:click="setTab('Transactions')"
                    type="button">
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Transactions</span>
            </button>

            <button class="tabs-menu-item {{ $activeTab === 'Rapports' ? 'is-active' : '' }}"
                    wire:click="setTab('Rapports')"
                    type="button">
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Rapports</span>
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
