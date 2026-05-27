<div class="tabs-card">

    <div class="tabs-layout">

        <!-- MENU TABS -->
        <nav class="tabs-menu">
            <button
                class="tabs-menu-item {{ $activeTab === 'employés' ? 'is-active' : '' }}"
                wire:click="setTab('employés')"
                type="button"
            >
                <i class="las la-sitemap tabs-icon"></i>
                <span class="tabs-label">Employés</span>
            </button>

            <button
                class="tabs-menu-item {{ $activeTab === 'contrats' ? 'is-active' : '' }}"
                wire:click="setTab('contrats')"
                type="button"
            >
                <i class="las la-file-contract tabs-icon"></i>
                <span class="tabs-label">Contrats</span>
            </button>

            <button
                class="tabs-menu-item {{ $activeTab === 'documents' ? 'is-active' : '' }}"
                wire:click="setTab('documents')"
                type="button"
            >
                <i class="las la-folder-open tabs-icon"></i>
                <span class="tabs-label">Documents</span>
            </button>
        </nav>

        <!-- CONTENT -->
        <section class="tabs-content">

            @if($activeTab === 'employés')
                <div class="tab-panel">
                    @livewire('employees.employee-index')
                </div>
            @endif

            @if($activeTab === 'contrats')
                <div class="tab-panel">
                    @livewire('contract-index')
                </div>
            @endif

            @if($activeTab === 'documents')
                <div class="tab-panel">
                    @livewire('documents-crud')
                </div>
            @endif

        </section>

    </div>

</div>
