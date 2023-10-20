<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\Backend\UserManagement\RoleStoreRequest;
use App\Http\Requests\Backend\UserManagement\RoleUpdateRequest;
use App\Http\Requests\UserManagement\CategoryTypeStoreRequest;
use App\Http\Requests\UserManagement\CategoryTypeUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller {

    public function index() {
        abort_if(Gate::denies('list_roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.user-management.roles.index');
    }

    public function create() {
        abort_if(Gate::denies('create_roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissionCategories = Permission::all()->groupBy('category');

        return view('backend.user-management.roles.create', compact('permissionCategories'));
    }

    public function store(RoleStoreRequest $request) {
        abort_if(Gate::denies('create_roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->permissions()->sync($request->permission_ids);

        session()->flash('success', __('backend.role_created_successfully'));

        return to_route('backend.user-management.roles.show', $role);
    }

    public function show(Role $role) {
        abort_if(Gate::denies('view_roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissionCategories = Permission::find($role->permissions()->pluck('permission_id'))->groupBy('category');

        return view('backend.user-management.roles.show', compact('role', 'permissionCategories'));
    }

    public function edit(Role $role) {
        abort_if(Gate::denies('edit_roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissionCategories = Permission::all()->groupBy('category');

        return view('backend.user-management.roles.edit', compact('role', 'permissionCategories'));
    }

    public function update(RoleUpdateRequest $request, Role $role) {
        abort_if(Gate::denies('edit_roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->update([
            'name' => $request->name,
        ]);

        $role->permissions()->sync($request->permission_ids);

        session()->flash('success', __('backend.role_updated_successfully'));

        return to_route('backend.user-management.roles.show', $role);
    }

}
