<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\RoleStoreRequest;
use App\Http\Requests\Backend\RoleUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Services\Backend\RoleService;

class RoleController extends Controller
{

    public function index()
    {
        $this->authorize('list_roles');

        return view('backend.roles.index');
    }

    public function create()
    {
        $this->authorize('create_roles');

        $permissionCategories = Permission::all()->groupBy('category');

        return view('backend.roles.create', compact('permissionCategories'));
    }

    public function store(RoleStoreRequest $request, RoleService $roleService)
    {
        $this->authorize('create_roles');

        $role = $roleService->store($request->validated());

        session()->flash('success', __('backend.role_created_successfully'));

        return to_route('backend.roles.show', $role);
    }

    public function show(Role $role)
    {
        $this->authorize('view_roles');

        $permissionCategories = Permission::find($role->permissions()->pluck('permission_id'))->groupBy('category');

        return view('backend.roles.show', compact('role', 'permissionCategories'));
    }

    public function edit(Role $role)
    {
        $this->authorize('edit_roles');

        $permissionCategories = Permission::all()->groupBy('category');

        return view('backend.roles.edit', compact('role', 'permissionCategories'));
    }

    public function update(RoleUpdateRequest $request, RoleService $roleService, Role $role)
    {
        $this->authorize('edit_roles');

        $role = $roleService->update($request->validated(), $role);

        session()->flash('success', __('backend.role_updated_successfully'));

        return to_route('backend.roles.show', $role);
    }

}
