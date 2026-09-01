<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services.index');
})->name('services.index');

Route::get('/packages', function () {
    return view('packages.index');
})->name('packages.index');

Route::get('/news', function () {
    return view('news.index');
})->name('news.index');

Route::get('/doctors', function () {
    return view('doctors.index');
})->name('doctors.index');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/appointments/create', function () {
    return view('appointments.create');
})->name('appointments.create');