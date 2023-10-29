<?php

namespace App\Livewire\Backend\Users;

use App\Http\Traits\Backend\Livewire\IndexFunctions;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class
Index extends Component
{
    use WithPagination, IndexFunctions;

    public $isActive;
    public $isAdmin;

    public function mount()
    {
        $this->init();
        $this->sortBy = 'name';
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->isActive && $this->isActive !== 'view_all', function ($query) {
                return $query->where('is_active', $this->isActive === 'yes');
            })
            ->when($this->isAdmin && $this->isAdmin !== 'view_all', function ($query) {
                return $query->where('is_admin', $this->isAdmin === 'yes');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->recordsPerPage);

        return view('backend.livewire.users.index', compact('users'));
    }

    public function delete($id)
    {
        abort_if(Gate::denies('delete_users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            User::destroy($id);

            $this->dispatch('flash', icon: 'success', message: __('backend.user_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('backend.unknown_error_occurred'));
        }
    }

    public function deleteMany()
    {
        abort_if(Gate::denies('delete_users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try {
            $indelibleUsers = User::query()->isAdmin()->orWhere('id', auth()->user()->id)->pluck('id')->toArray();

            User::whereIn('id', array_diff($this->selectedRecords, $indelibleUsers))->delete();

            $this->dispatch('flash', icon: 'success', message: __('backend.users_deleted_successfully'));

        } catch (QueryException $e) {
            $this->dispatch('flash', icon: 'error', message: __('backend.unknown_error_occurred'));
        }

        $this->resetSelectedRecords();
    }

    public function clearFilters()
    {
        $this->reset(['isActive', 'isAdmin']);
    }
}
