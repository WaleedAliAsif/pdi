<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\GeneralController;
use App\Http\Controllers\Backend\DesignationController;
use App\Http\Controllers\Backend\PatientController;
use App\Http\Controllers\Backend\CitiesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect(url('/dashboard'));
    } else {
        return redirect('/login');
    }
});
Route::post('pakistan/cities/get/',[CitiesController::class,'getCities'])->name('cities.get');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'],function () {

    Route::get('/', [GeneralController::class, 'dashboard'])->name('dashboard');

    // Route::resource('users', UserController::class);
    Route::get('users', [UserController::class, 'index'])->name('users.index')->middleware(['can:Read Users']);
    Route::get('user/create', [UserController::class, 'create'])->name('users.create')->middleware(['can:Create Users']);
    Route::post('user/create/save', [UserController::class, 'store'])->name('users.store')->middleware(['can:Create Users']);
    Route::get('user/{id}', [UserController::class, 'show'])->name('users.show')->middleware(['can:Read Users']);
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware(['can:Update Users']);
    Route::put('user/{id}/update', [UserController::class, 'update'])->name('users.update')->middleware(['can:Update Users']);
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware(['can:Delete Users']);

    // Route::resource('roles', RoleController::class);
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index')->middleware(['can:Read Roles']);
    Route::get('role/create', [RoleController::class, 'create'])->name('roles.create')->middleware(['can:Create Roles']);
    Route::post('role/create/save', [RoleController::class, 'store'])->name('roles.store')->middleware(['can:Create Roles']);
    Route::get('role/{id}', [RoleController::class, 'show'])->name('roles.show')->middleware(['can:Read Roles']);
    Route::get('role/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit')->middleware(['can:Update Roles']);
    Route::put('role/{id}/update', [RoleController::class, 'update'])->name('roles.update')->middleware(['can:Update Roles']);
    Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware(['can:Delete Roles']);



    Route::get('cities', [CitiesController::class, 'index'])->name('cities.index');//->middleware(['can:Read Roles']);
    Route::get('city/create', [CitiesController::class, 'create'])->name('cities.create');//->middleware(['can:Create Roles']);
    Route::post('city/create/save', [CitiesController::class, 'store'])->name('cities.store');//->middleware(['can:Create Roles']);
    Route::get('city/{id}', [CitiesController::class, 'show'])->name('cities.show');//->middleware(['can:Read Roles']);
    Route::get('city/{id}/edit', [CitiesController::class, 'edit'])->name('cities.edit');//->middleware(['can:Update Roles']);
    Route::put('city/{id}/update', [CitiesController::class, 'update'])->name('cities.update');//->middleware(['can:Update Roles']);
    Route::delete('city/{id}', [CitiesController::class, 'destroy'])->name('cities.destroy');//->middleware(['can:Delete Roles']);
    Route::get('import/cities', [CitiesController::class, 'addCities'])->name('addCities');
    Route::post('importCities', [CitiesController::class, 'importCities'])->name('importCities');




    Route::resource('patients', PatientController::class);
    Route::get('add-test/{id}', [PatientController::class, 'addTests'])->name('patients.addTests');
    Route::post('add-test/{id}/save', [PatientController::class, 'addTestsSave'])->name('patients.addTestsSave');
    Route::get('test/{id}/edit', [PatientController::class, 'editTest'])->name('patients.editTest');
    Route::put('test/{id}/update', [PatientController::class, 'updateTest'])->name('patients.updateTest');


    Route::get('designations', [DesignationController::class, 'index'])->name('designations.index')->middleware(['can:Read Designations']);
    Route::get('designation/create', [DesignationController::class, 'create'])->name('designations.create')->middleware(['can:Create Designations']);
    Route::post('designation/create/save', [DesignationController::class, 'store'])->name('designations.store')->middleware(['can:Create Designations']);
    Route::get('designation/{id}', [DesignationController::class, 'show'])->name('designations.show')->middleware(['can:Read Designations']);
    Route::get('designation/{id}/edit', [DesignationController::class, 'edit'])->name('designations.edit')->middleware(['can:Update Designations']);
    Route::put('designation/{id}/update', [DesignationController::class, 'update'])->name('designations.update')->middleware(['can:Update Designations']);
    Route::delete('designation/{id}', [DesignationController::class, 'destroy'])->name('designations.destroy')->middleware(['can:Delete Designations']);

    
    Route::get('reset-password/{user}', [UserController::class, 'reset_password'])->name('users.reset_password');
    Route::get('my-profile', [GeneralController::class, 'myProfile'])->name('site.myProfile');
    Route::get('site-settings', [GeneralController::class, 'siteSettings'])->name('site.siteSettings');
    Route::post('/site-settings-save', [GeneralController::class, 'save_general_settings'])->name('site_settings_save');    
});
require __DIR__.'/auth.php';
