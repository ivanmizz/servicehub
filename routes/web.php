<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookserviceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//route to redirect user to their correct pages
Route::get('/home', [HomeController::class, 'redirect'])->name('home');

//user routes to book services
Route::get('/bookservice', [BookserviceController::class, 'bookservice'])->name('user.bookservice')->middleware('auth');
Route::get('/bookservice/{service}', [BookserviceController::class, 'create'])->name('bookservice.book')->middleware('auth');
Route::post('/bookservice/{service}', [BookserviceController::class, 'store'])->name('bookservice.store')->middleware('auth');

//user route for bookings details
Route::get('/bookings', [BookingController::class, 'index'])->name('user.booking')->middleware('auth');
Route::delete('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel')->middleware('auth');

//admin routes for bookings
Route::get('/admin/bookings', [BookingController::class, 'showAllBookings'])->name('admin.bookings')->middleware(['auth', 'verified', 'admin']);

Route::get('/admin/clients', [UserController::class, 'showClients'])->name('admin.clients.view')->middleware(['auth', 'verified', 'admin']);


// Assign staff (assuming it's a POST route)
Route::post('/booking/{booking}/assign-staff', 'BookingController@assignStaff')->name('booking.assignStaff');


//resource routes
Route::resource('staff', StaffController::class) ->only(['addview', 'store', 'index', 'create', 'destroy', 'edit', 'update'])->middleware(['auth', 'verified', 'admin']);
Route::resource('department', DepartmentController::class)->only(['show', 'index', 'store', 'destroy'])->middleware(['auth', 'verified', 'admin']);
Route::resource('service', ServiceController::class)->only(['index', 'store', 'show', 'destroy'])->middleware(['auth', 'verified', 'admin']);
Route::resource('booking', BookingController::class)->middleware(['auth', 'verified', 'admin']);


