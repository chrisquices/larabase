<?php

namespace App\Livewire\Backend\HealthyDome;

use App\Http\Traits\Backend\Livewire\IndexFunctions;
use App\Models\HealthyDome;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, IndexFunctions;

    public function mount()
    {
        $this->init();
        $this->sortBy = 'name';
    }

    public function render()
    {
        $healthyDomes = HealthyDome::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->recordsPerPage);

        return view('backend.livewire.healthy-dome.index', compact('healthyDomes'));
    }

    public function delete($id)
    {
        abort_if(Gate::denies('delete_healthy_domes'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            HealthyDome::destroy($id);

            $this->dispatch('flash', icon: 'success', message: __('backend.healthy_dome_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('backend.unknown_error_occurred'));
        }
    }

    public function deleteMany()
    {
        abort_if(Gate::denies('delete_healthy_domes'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            HealthyDome::whereIn('id', $this->selectedRecords)->delete();

            $this->dispatch('flash', icon: 'success', message: __('backend.healthy_domes_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('backend.unknown_error_occurred'));
        }

        $this->resetSelectedRecords();
    }

}
