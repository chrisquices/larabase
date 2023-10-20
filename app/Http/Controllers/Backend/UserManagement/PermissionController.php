<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\Backend\UserManagement\PermissionStoreRequest;
use App\Http\Requests\Backend\UserManagement\PermissionUpdateRequest;
use App\Models\Permission;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller {

    public function index() {
        abort_if(Gate::denies('list_permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.user-management.permissions.index');
    }

    public function create() {
        abort_if(Gate::denies('create_permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.user-management.permissions.create');
    }

    public function store(PermissionStoreRequest $request) {
        abort_if(Gate::denies('create_permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission = Permission::create([
            'category' => $request->category,
            'name' => $request->name,
            'code' => $request->code,
        ]);

        session()->flash('success', __('backend.permission_created_successfully'));

        return to_route('backend.user-management.permissions.show', $permission);
    }

    public function show(Permission $permission) {
        abort_if(Gate::denies('view_permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.user-management.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission) {
        abort_if(Gate::denies('edit_permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.user-management.permissions.edit', compact('permission'));
    }

    public function update(PermissionUpdateRequest $request, Permission $permission) {
        abort_if(Gate::denies('edit_permissions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->update([
            'category' => $request->category,
            'name' => $request->name,
            'code' => $request->code,
        ]);

        session()->flash('success', __('backend.permission_updated_successfully'));

        return to_route('backend.user-management.permissions.show', $permission);
    }

}
