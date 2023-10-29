<?php

namespace App\Livewire\Backend;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class GlobalSearch extends Component {

    public $search = '';
    public $results = [];

    public function render() {
        $this->resetResults();

        if ($this->search) {
            $this->getUsers();
            $this->getRoles();
        }

        return view('backend.livewire.global-search');
    }

    public function resetResults() {
        $this->results = [];
    }

    public function addToResults($category, $items) {
        $this->results[] = [
            'category' => $category,
            'items'    => $items->toArray(),
        ];
    }

    public function getUsers() {
        if (Gate::allows('view_users')) {
            $users = User::select('id', 'name', 'last_name')
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orderBy('name', 'asc')
                ->get()
                ->map(function ($item) {
                    return [
                        'route' => route('backend.users.show', $item),
                        'name'  => "$item->name $item->last_name"
                    ];
                });

            if (!$users->isEmpty()) $this->addToResults(__('backend.users'), $users);
        }
    }

    public function getRoles() {
        if (Gate::allows('view_roles')) {
            $roles = Role::select('id', 'name')
                ->where('name', 'like', '%' . $this->search . '%')
                ->orderBy('name', 'asc')
                ->get()
                ->map(function ($item) {
                    return [
                        'route' => route('backend.roles.show', $item),
                        'name'  => $item->name
                    ];
                });

            if (!$roles->isEmpty()) $this->addToResults(__('backend.roles'), $roles);
        }
    }
}


