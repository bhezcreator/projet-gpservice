<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');

    Route::get('/commerciale', function () {
        return view('pages.commerciale');
    })->name('commerciale');

    Route::get('/missions', function () {
        return view('pages.missions');
    })->name('missions');

    Route::get('/interventions', function () {
        return view('pages.interventions');
    })->name('interventions');

    Route::get('/clients', function () {
        return view('pages.clients');
    })->name('clients');

    Route::get('/contrats', function () {
        return view('pages.contrats');
    })->name('contrats');

    Route::get('/finance', function () {
        return view('pages.finance');
    })->name('finance');

    Route::get('/logistique', function () {
        return view('pages.logistique');
    })->name('logistique');

    Route::get('/geolocalisation', function () {
        return view('pages.geolocalisation');
    })->name('geolocalisation');

    Route::get('/communication', function () {
        return view('pages.communication');
    })->name('communication');

    Route::get('/documents', function () {
        return view('pages.documents');
    })->name('documents');

    Route::get('/rapports', function () {
        return view('pages.rapports');
    })->name('rapports');

    Route::get('/administration', function () {
        return view('pages.administration');
    })->name('administration');

    Route::get('/parametres', function () {
        return view('pages.parametres');
    })->name('parametres');

    Route::get('/notifications', function () {
        return view('pages.notification');
    })->name('notifications');
});
