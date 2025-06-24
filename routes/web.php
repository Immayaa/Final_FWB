<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleMiddleware;


Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/loginPost',[AuthController::class, 'loginPost'])->name('login.post');


Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/registerPost',[AuthController::class, 'registerPost'])->name('register.post');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');


// Middleware dipakai secara langsung per grup atau per route
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard',[SessionController::class,'adminDashboard'])->name('admin.dashboard');
    //Manajemen User
    Route::get('/user', [SessionController::class, 'indexUser'])->name('user.index');
    Route::get('/user/{id}/edit', [SessionController::class, 'editUser'])->name('user.edit');;
    Route::put('/user/{id}', [SessionController::class, 'updateUser'])->name('user.update');
    Route::delete('/user/{id}', [SessionController::class, 'destroyUser'])->name('user.delete');
    Route::post('/user/{id}/activate', [SessionController::class, 'activateUser'])->name('user.activate');
    Route::post('/user/{id}/deactivate', [SessionController::class, 'deactivateUser'])->name('user.deactivate');

    //Manajemen Menu
    Route::get('/admin/menu', [SessionController::class, 'indexMenu'])->name('menu.index');
    Route::get('/admin/menu/create', [SessionController::class, 'createMenu'])->name('menu.create');
    Route::post('/admin/menu/store', [SessionController::class, 'storeMenu'])->name('menu.store');
    Route::get('/admin/menu/edit/{id}', [SessionController::class, 'editMenu'])->name('menu.edit');
    Route::post('/admin/menu/update/{id}', [SessionController::class, 'updateMenu'])->name('menu.update');
    Route::delete('/admin/menu/delete/{id}', [SessionController::class, 'destroyMenu'])->name('menu.delete');

    //manajemen pesanan
    Route::get('/admin/pesanan', [SessionController::class, 'indexOrder'])->name('orders.index');
    Route::get('/admin/pesanan/{id}', [SessionController::class, 'showOrder'])->name('orders.show');
    Route::post('/admin/pesanan/{id}/status', [SessionController::class, 'updateStatusOrder'])->name('orders.updateStatus');

    //Manajemen Profile
    Route::get('/admin/profile', [SessionController::class, 'editProfile'])->name('admin.profile');
    Route::post('/admin/profile', [SessionController::class, 'updateProfile'])->name('admin.profile.update');

});







Route::middleware(['auth', RoleMiddleware::class . ':staff'])->group(function () {
     Route::get('/staff/dashboard', [SessionController::class, 'staffDashboard'])->name('staff.dashboard');

     //kelola order
     Route::get('/staff/orders', [SessionController::class, 'manageOrders'])->name('staff.orders');
     Route::post('/staff/orders/{id}/update', [SessionController::class, 'updateOrder'])->name('staff.orders.update');

     // profile
     Route::get('/staff/profile', [SessionController::class, 'editStaffProfile'])->name('staff.profile.edit');
     Route::post('/staff/profile', [SessionController::class, 'updateStaffProfile'])->name('staff.profile.update');
});






//nomor 5
Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/userDashboard', [SessionController::class, 'userDashboard'])->name('user.dashboard');

    //detail produk
    Route::get('/menu/{id}', [SessionController::class, 'detailMenu'])->name('user.menu.detail');
    Route::post('/menu/order/{id}', [SessionController::class, 'orderMenu'])->name('user.menu.order');

    //riwayat pesanan
    Route::get('/riwayat-pesanan', [SessionController::class, 'riwayatPesanan'])->name('user.riwayat');
    Route::post('/riwayat-pesanan/batal/{id}', [SessionController::class, 'batalkanPesanan'])->name('user.riwayat.batal');

    //profile user
    Route::get('/profil/edit', [SessionController::class, 'editProfil'])->name('user.profil.edit');
    Route::post('/profil/update', [SessionController::class, 'updateProfil'])->name('user.profil.update');  
});