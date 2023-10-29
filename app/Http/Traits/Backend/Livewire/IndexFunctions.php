<?php

namespace App\Http\Traits\Backend\Livewire;

use Livewire\Attributes\Url;

trait IndexFunctions
{

    public $search;
    public $sortBy;
    public $sortDirection;
    public $recordsPerPage;
    public $recordsPerPageOptions;
    public $selectedRecord;
    public $selectedRecords = [];
    public $action;

    public function init()
    {
        $this->sortDirection = 'asc';
        $this->recordsPerPage = getSetting('backend_records_per_page');
        $this->recordsPerPageOptions = array_map('intval', explode(',', getSetting('backend_records_per_page_options')));
        $this->selectedRecord = '';
        $this->selectedRecords = [];
    }

    public function setSelectedRecord($recordId)
    {
        $this->selectedRecord = $recordId;

        $this->dispatch('record-selected');
    }

    public function resetSelectedRecord()
    {
        $this->selectedRecord = null;
    }

    public function resetSelectedRecords()
    {
        $this->selectedRecords = [];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updateSortBy($column)
    {
        $previousSortByValue = $this->sortBy;

        $this->sortBy = $column;

        $this->sortDirection = ($previousSortByValue === $column) ? $this->reverseSort() : $this->sortDirection;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }

    public function confirm($action, $message = false)
    {
        $this->action = $action;
        $this->dispatch('confirm', message: $message);
    }

    public function confirmed()
    {
        $action = strtok($this->action, '(');
        $arguments = preg_match_all('/\((.*?)\)/', $this->action, $matches) ? preg_split('/,\s*/', $matches[1][0]) : [];
        $argumentCount = count($arguments);

        if ($argumentCount === 0 || $argumentCount === 1) {
            call_user_func([$this, $action], $arguments[0] ?? false);
        } elseif ($argumentCount > 1) {
            call_user_func_array([$this, $action], $arguments);
        }
    }
}
