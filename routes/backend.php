<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TemporaryFileController;
use App\Http\Controllers\Backend\UserManagement\PermissionController;
use App\Http\Controllers\Backend\UserManagement\ProfileController;
use App\Http\Controllers\Backend\UserManagement\RoleController;
use App\Http\Controllers\Backend\UserManagement\UserController;
use App\Http\Controllers\Backend\UtilityController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'active', 'verified', 'set.locale'])->name('backend.')->prefix('backend')->group(function () {

    Route::get('/', [DashboardController::class, 'redirectToIndex']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('temporary-files')->name('temporary-files.')->group(function () {
        Route::post('/store', [TemporaryFileController::class, 'store'])->name('store');
    });

    Route::prefix('utilities')->name('utilities.')->group(function () {
        Route::patch('/update-preferred-theme', [UtilityController::class, 'updatePreferredTheme'])->name('update-preferred-theme');
    });

    Route::prefix('user-management')->name('user-management.')->group(function () {

        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::patch('/update', [ProfileController::class, 'update'])->name('update');
            Route::patch('/update-photo', [ProfileController::class, 'updatePhoto'])->name('update-photo');
            Route::patch('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');
        });

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/{user}', [UserController::class, 'show'])->name('show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
            Route::patch('/{user}/update', [UserController::class, 'update'])->name('update');
            Route::delete('/{user}/delete', [UserController::class, 'delete'])->name('delete');
        });

        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index');
            Route::get('/create', [RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/{role}', [RoleController::class, 'show'])->name('show');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
            Route::patch('/{role}/update', [RoleController::class, 'update'])->name('update');
            Route::delete('/{role}/delete', [RoleController::class, 'delete'])->name('delete');
        });

        Route::prefix('permissions')->name('permissions.')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('index');
            Route::get('/create', [PermissionController::class, 'create'])->name('create');
            Route::post('/store', [PermissionController::class, 'store'])->name('store');
            Route::get('/{permission}', [PermissionController::class, 'show'])->name('show');
            Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('edit');
            Route::patch('/{permission}/update', [PermissionController::class, 'update'])->name('update');
            Route::delete('/{permission}/delete', [PermissionController::class, 'delete'])->name('delete');
        });
    });
});
