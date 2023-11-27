<?php

namespace App\Services\Backend;

use App\Models\Dog;

class DogService
{

    public function store(array $dogData): Dog
    {
        $dog = Dog::create([
            'name' => $dogData['name'],
        ]);

        return $dog;
    }

    public function update(array $dogData, $dog): Dog
    {
        $dog->update([
            'name' => $dogData['name'] ?? $dog->name,
        ]);

        return $dog;
    }
}
