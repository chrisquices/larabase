<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UserStoreRequest;
use App\Http\Requests\Backend\UserUpdateRequest;
use App\Models\Locale;
use App\Models\Role;
use App\Models\User;
use App\Services\Backend\UserService;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function index()
    {
        $this->authorize('list_users');

        return view('backend.users.index');
    }

    public function create()
    {
        $this->authorize('create_users');

        $locales = Locale::all();
        $roles = Role::all();

        return view('backend.users.create', compact('locales', 'roles'));
    }

    public function store(UserStoreRequest $request, UserService $userService)
    {
        $this->authorize('create_users');

        $user = $userService->store($request->validated());

        session()->flash('success', __('backend.user_created_successfully'));

        return to_route('backend.users.show', $user);
    }

    public function show(User $user)
    {
        $this->authorize('view_users');

        return view('backend.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('edit_users');
        abort_if($user->is_admin, Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if($user->id === auth()->id(), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locales = Locale::all();
        $roles = Role::all();

        return view('backend.users.edit', compact('user', 'locales', 'roles'));
    }

    public function update(UserUpdateRequest $request, UserService $userService, User $user)
    {
        $this->authorize('edit_users');

        $user = $userService->update($request->validated(), $user);

        session()->flash('success', __('backend.user_updated_successfully'));

        return to_route('backend.users.show', $user);
    }

}
