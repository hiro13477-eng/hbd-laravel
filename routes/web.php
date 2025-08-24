<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('loading');
})->name('home');

Route::get('/contoh1', function () {
    return view('contoh1');
})->name('question1');

Route::get('/contoh2', function () {
    return view('contoh2');
})->name('question2');

Route::post('/save-birthday', function () {
    $date = request('date');
    session(['birthday_date' => $date]);
    return response()->json(['success' => true]);
})->name('save.birthday');

Route::get('/contoh3', function () {
    $birthdayDate = session('birthday_date', '?');
    return view('contoh3', compact('birthdayDate'));
})->name('main.menu');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/comic', function () {
    return view('comic');
})->name('comic');

Route::get('/drama', function () {
    return view('drama');
})->name('drama');

Route::get('/music', function () {
    return view('music');
})->name('music');

Route::get('/secret', function () {
    return view('secret');
})->name('secret');