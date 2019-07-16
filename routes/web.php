<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//Temp routes for voting
Route::get('/voting', function () {
    return view('public_voting.login');
})->name('Voting');
Route::get('/voting/register', function () {
    return view('public_voting.register');
})->name('Public registration');
