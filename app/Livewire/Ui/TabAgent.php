<?php

namespace App\Livewire\Ui;

use Livewire\Component;

class TabAgent extends Component
{
    public string $activeTab = 'agents';

    // Permet de synchroniser $activeTab avec la query string
    protected $queryString = ['activeTab'];

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.ui.tab-agent');
    }
}
