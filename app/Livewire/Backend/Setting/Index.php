<?php

namespace App\Livewire\Backend\Setting;

use Livewire\Component;

class Index extends Component
{

    public $activeTab;
    public $backendRecordsPerPage;
    public $backendRecordsPerPageOptions;
    public $frontendStatus;
    public $frontendRedirectTo;

    public function mount()
    {
        $this->activeTab = 'backend';
        $this->backendRecordsPerPage = getSetting('backend_records_per_page');
        $this->backendRecordsPerPageOptions = getSetting('backend_records_per_page_options');
        $this->frontendStatus = getSetting('frontend_status');
        $this->frontendRedirectTo = getSetting('frontend_redirect_to');
    }

    public function render()
    {
        return view('backend.livewire.setting.index');
    }

    public function changeActiveTab($tab)
    {
        $this->activeTab = $tab;
    }
}
