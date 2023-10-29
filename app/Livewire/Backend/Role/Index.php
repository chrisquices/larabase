<?php

namespace App\Livewire\Backend\Role;

use App\Http\Traits\Backend\Livewire\IndexFunctions;
use App\Models\Role;
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
        $roles = Role::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->recordsPerPage);

        return view('backend.livewire.role.index', compact('roles'));
    }

    public function delete($id)
    {
        abort_if(Gate::denies('delete_roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            Role::destroy($id);

            $this->dispatch('flash', icon: 'success', message: __('backend.role_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('backend.unknown_error_occurred'));
        }
    }

    public function deleteMany()
    {
        abort_if(Gate::denies('delete_roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            Role::whereIn('id', $this->selectedRecords)->delete();

            $this->dispatch('flash', icon: 'success', message: __('backend.roles_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('backend.unknown_error_occurred'));
        }

        $this->resetSelectedRecords();
    }

}
