<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\PermissionStoreRequest;
use App\Http\Requests\Backend\PermissionUpdateRequest;
use App\Models\Permission;
use App\Services\Backend\PermissionService;

class PermissionController extends Controller {

    public function index() {
        $this->authorize('list_permissions');

        return view('backend.permissions.index');
    }

    public function create() {
        $this->authorize('create_permissions');

        return view('backend.permissions.create');
    }

    public function store(PermissionStoreRequest $request, PermissionService $permissionService) {
        $this->authorize('create_permissions');

        $permission = $permissionService->store($request->validated());

        session()->flash('success', __('backend.permission_created_successfully'));

        return to_route('backend.permissions.show', $permission);
    }

    public function show(Permission $permission) {
        $this->authorize('view_permissions');

        return view('backend.permissions.show', compact('permission'));
    }

    public function edit(Permission $permission) {
        $this->authorize('edit_permissions');

        return view('backend.permissions.edit', compact('permission'));
    }

    public function update(PermissionUpdateRequest $request, PermissionService $permissionService, Permission $permission) {
        $this->authorize('edit_permissions');

        $permission = $permissionService->update($request->validated(), $permission);

        session()->flash('success', __('backend.permission_updated_successfully'));

        return to_route('backend.permissions.show', $permission);
    }

}
