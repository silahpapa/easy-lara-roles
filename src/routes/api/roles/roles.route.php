<?php
Route::controller(\Silah\LaraRoles\App\Http\Controllers\Api\Roles\RolesController::class)->group(function () {
    Route::get('list','index')->whereIn('roles', ['admin']);
    Route::post('store','store')->whereIn('roles', ['admin']);
    Route::post('deactivate','deactivate')->whereIn('roles', ['admin']);
});
