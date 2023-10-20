<?php

namespace App\Http\Controllers\Backend\UserManagement;

use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\Backend\UserManagement\UserStoreRequest;
use App\Http\Requests\Backend\UserManagement\UserUpdateRequest;
use App\Models\Locale;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function index() {
        abort_if(Gate::denies('list_users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.user-management.users.index');
    }

    public function create() {
        abort_if(Gate::denies('create_users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locales = Locale::all();
        $roles = Role::all();

        return view('backend.user-management.users.create', compact('locales', 'roles'));
    }

    public function store(UserStoreRequest $request) {
        abort_if(Gate::denies('create_users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::create([
            'locale_id' => $request->locale_id,
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'is_active' => $request->is_active,
            'is_admin'  => $request->is_admin ?? false,
        ]);

        $user->roles()->sync($request->role_ids);

        session()->flash('success', __('backend.user_created_successfully'));

        return to_route('backend.user-management.users.show', $user);
    }

    public function show(User $user) {
        abort_if(Gate::denies('view_users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backend.user-management.users.show', compact('user'));
    }

    public function edit(User $user) {
        abort_if(Gate::denies('edit_users'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if($user->is_admin, Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if($user->id === auth()->id(), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locales = Locale::all();
        $roles = Role::all();

        return view('backend.user-management.users.edit', compact('user', 'locales', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user) {
        abort_if(Gate::denies('edit_users'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->update([
            'locale_id' => $request->locale_id,
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'is_active' => $request->is_active,
            'is_admin' => $request->is_admin,
        ]);

        if ($request->password) $user->update(['password' => Hash::make($request->password)]);

        $user->roles()->sync($request->role_ids);

        session()->flash('success', __('backend.user_updated_successfully'));

        return to_route('backend.user-management.users.show', $user);
    }

}
