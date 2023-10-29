<?php

Route::middleware(['auth', 'active', 'verified', 'set.locale'])->name('backend.')->prefix('backend')->group(function () {
    require __DIR__ . '/backend.php';
});

Route::middleware(['frontend.status', 'frontend.redirect'])->name('frontend.')->group(function () {
    require __DIR__ . '/frontend.php';
});

require __DIR__ . '/auth.php';
