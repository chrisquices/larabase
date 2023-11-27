<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\DogStoreRequest;
use App\Http\Requests\Backend\DogUpdateRequest;
use App\Models\Dog;
use App\Services\Backend\DogService;

class DogController extends Controller
{

    public function index()
    {
        $this->authorize('list_dogs');

        return view('backend.dogs.index');
    }

    public function create()
    {
        $this->authorize('create_dogs');

        return view('backend.dogs.create');
    }

    public function store(DogStoreRequest $request, DogService $dogService)
    {
        $this->authorize('create_dogs');

        $dog = $dogService->store($request->validated());

        session()->flash('success', __('backend.dog_created_successfully'));

        return to_route('backend.dogs.show', $dog);
    }

    public function show(Dog $dog)
    {
        $this->authorize('view_dogs');

        return view('backend.dogs.show', compact('dog'));
    }

    public function edit(Dog $dog)
    {
        $this->authorize('edit_dogs');

        return view('backend.dogs.edit', compact('dog'));
    }

    public function update(DogUpdateRequest $request, DogService $dogService, Dog $dog)
    {
        $this->authorize('edit_dogs');

        $dog = $dogService->update($request->validated(), $dog);

        session()->flash('success', __('backend.dog_updated_successfully'));

        return to_route('backend.dogs.show', $dog);
    }

}
