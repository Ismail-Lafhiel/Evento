<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReservationController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/company', [IndexController::class, 'company'])->name('company');
Route::get('/discover-events', [IndexController::class, 'events'])->name('discover-events');
Route::get('/event/{id}', [IndexController::class, 'event'])->name('event');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::post('/search/events', [IndexController::class, 'search'])->name('search.events');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/profile', [UserController::class, 'profileInfo'])->name('user_profile');
    Route::get('/reservations', [UserController::class, 'userReservations'])->name('userReservations')->middleware('role:spectator');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'attachPermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'detachPermission'])->name('roles.permissions.detach');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'attachRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

    //category route
    Route::resource('/categories', CategoryController::class);
});

Route::middleware(['auth', 'role:admin|organizer'])->group(function () {
    Route::resource('/events', EventController::class);
    // approve or deny events
    Route::post('/approve-event/{event}', [EventController::class, 'approveEvents'])
        ->name('approve-event');
    Route::post('/deny-event/{event}', [EventController::class, 'denyEvents'])
        ->name('deny-event');
    // approve or deny reservations
    Route::post('/approve-reservation/{reservation}', [EventController::class, 'approveReservation'])
        ->name('approve-reservation');
    Route::post('/deny-reservation/{reservation}', [EventController::class, 'denyReservation'])
        ->name('deny-reservation');
});

// reservation route
Route::post('/book-now/{eventId}', [ReservationController::class, 'bookNow'])
    ->name('book.now')
    ->middleware(['auth', 'role:spectator']);
