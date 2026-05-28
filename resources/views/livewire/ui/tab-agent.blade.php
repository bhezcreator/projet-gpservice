<div class="tabs-card">

    <div class="tabs-layout">

        <!-- MENU TABS -->
        <nav class="tabs-menu">
            <button
                    class="tabs-menu-item {{ $activeTab === 'agents' ? 'is-active' : '' }}"
                    wire:click="setTab('agents')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Agents internes</span>
            </button>

            <button
                    class="tabs-menu-item {{ $activeTab === 'agents-externes' ? 'is-active' : '' }}"
                    wire:click="setTab('agents-externes')"
                    type="button"
                >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Agents externes</span>
            </button>

            <button 
                    class="tabs-menu-item {{ $activeTab === 'Presence' ? 'is-active' : '' }}"
                    wire:click="setTab('Presence')"
                    type="button"
                >
                <i class="las la-file-contract tabs-icon"></i>
                <span class="tabs-label">Présence</span>
            </button>

            <button
                    class="tabs-menu-item {{ $activeTab === 'Disponibilités' ? 'is-active' : '' }}"
                    wire:click="setTab('Disponibilites')"
                    type="button"
                >
                <i class="las la-folder-open tabs-icon"></i>
                <span class="tabs-label">Disponibilités</span>
            </button>

            <button class="tabs-menu-item {{ $activeTab === 'Departements' ? 'is-active' : '' }}"
                    wire:click="setTab('Departements')"
                    type="button"
                >
                <i class="las la-folder-open tabs-icon"></i>
                <span class="tabs-label">Départements</span>
            </button>
        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'agents')
                <div class="tab-panel">
                    @livewire('agents.agent-interne')
                </div>
            @endif

            @if($activeTab === 'agents-externes')
                <div class="tab-panel">
                    
                </div>
            @endif

            @if($activeTab === 'Presence')
                <div class="tab-panel">
                    
                </div>
            @endif 

            @if($activeTab === 'Disponibilites')
                <div class="tab-panel">
                
                </div>
            @endif

            @if($activeTab === 'Departements')
                <div class="tab-panel">
                
                </div>
            @endif

        </section>

    </div>

</div>
