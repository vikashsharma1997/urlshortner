<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->middleware('auth')->group(function(){
    Route::get('/', 'index')->name('home');


    Route::get('/clients', 'clients')->name('clients')->middleware('role:1');
    Route::get('/clients/invite', 'clientinvite')->name('clients.invite');
    Route::post('/clients/invite', 'sendInvitation')->name('clients.sendInvitation');


    Route::get('/members', 'members')->name('members')->middleware('role:2');
    Route::get('/members/invite', 'memberinvite')->name('members.invite')->middleware('role:2');
    Route::post('/members/invite', 'memberPostInvite')->name('members.memberPostInvite')->middleware('role:2');


    Route::get('/generate-short-url', 'generateShortUrl')->name('generateshorturl')->middleware('role:2,3');
    Route::post('/generate-short-url', 'generatePostShortUrl')->name('generateshorturl.post')->middleware('role:2,3');
    Route::get('/generated-short-urls', 'generatedShortUrls')->name('generatedshorturls');


    Route::post('/export', 'export')->name('export');


    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(AuthController::class)->middleware('guest')->group(function(){
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
});

Route::get('{slug}', [HomeController::class, 'urlRedirect']);