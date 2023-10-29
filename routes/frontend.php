<?php
use App\Http\Controllers\Frontend\HomeController;

Route::middleware(['frontend.status', 'frontend.redirect'])->name('frontend.')->group(function () {

    Route::get('/', [HomeController::class, 'index']);

});
