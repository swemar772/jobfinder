<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::fallback(function(){
    return redirect()->back();
});


Route::group(['prefix' => 'findjob_admin'], routes: function(){

    Route::group(['middleware' => 'auth'],routes: function(){

        Route::get('logout', [HomeController::class, 'logout'])->name('logout');
    });
    //Authentiated Middleware
    Route::group(['middleware' => 'adminuser'], function(){

        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::get('users/{id}/edit',[UserController::class, 'edit'])->name('users.edit');
        Route::post('users/{id}',[UserController::class, 'update'])->name('users.update');
        Route::get('users/{id}/delete',[UserController::class, 'delete'])->name('users.delete');
        Route::post('users/{id}/changepassword',[UserController::class, 'changepassword'])->name('users.changepassword');


        //roles management
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('roles/{id}/edit',[RoleController::class, 'edit'])->name('roles.edit');
        Route::post('roles/{id}',[RoleController::class, 'update'])->name('roles.update');
        Route::get('roles/{id}/delete',[RoleController::class, 'delete'])->name('roles.delete');

        //permissions management
        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
        Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
        Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
        Route::get('permissions/{id}/edit',[PermissionController::class, 'edit'])->name('permissions.edit');
        Route::post('permissions/{id}',[PermissionController::class, 'update'])->name('permissions.update');
        Route::get('permissions/{id}/delete',[PermissionController::class, 'delete'])->name('permissions.delete');

        //settings management
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::get('settings/create', [SettingController::class, 'create'])->name('settings.create');
        Route::post('settings', [SettingController::class, 'store'])->name('settings.store');
        Route::get('settings/{id}/edit',[SettingController::class, 'edit'])->name('settings.edit');
        Route::post('settings/{id}',[SettingController::class, 'update'])->name('settings.update');
        Route::get('settings/{id}/delete',[SettingController::class, 'delete'])->name('settings.delete');
    });

});


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login',[HomeController::class, 'login'])->name('login');
Route::post('/login',[HomeController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register',action: [HomeController::class, 'register'])->name('register');
Route::post('/register',[HomeController::class, 'register_store'])->name('register.store');