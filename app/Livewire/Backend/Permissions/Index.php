<?php

namespace App\Livewire\Backend\Permissions;

use App\Http\Traits\Backend\Livewire\IndexFunctions;
use App\Models\Permission;
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
        $this->sortBy = 'category';
    }

    public function render()
    {
        $permissions = Permission::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->recordsPerPage);

        return view('backend.livewire.permissions.index', compact('permissions'));
    }

    public function delete($id)
    {
        abort_if(Gate::denies('delete_permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            Permission::destroy($id);

            $this->dispatch('flash', icon: 'success', message: __('backend.permission_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('backend.unknown_error_occurred'));
        }

        $this->resetSelectedRecord();
    }

    public function deleteMany()
    {
        abort_if(Gate::denies('delete_permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            Permission::whereIn('id', $this->selectedRecords)->delete();

            $this->dispatch('flash', icon: 'success', message: __('backend.permissions_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('backend.unknown_error_occurred'));
        }

        $this->resetSelectedRecords();
    }
}
