<?php

use App\Livewire\Auth\Login;
use App\Livewire\Candidate\CandidateList;
use App\Livewire\Candidate\CreateCandidateList;
use App\Livewire\Candidate\EditCandidateList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Master\Kecamatan\CreateKecamatan;
use App\Livewire\Master\Kecamatan\EditKecamatanList;
use App\Livewire\Master\Kecamatan\KecamatanList;
use App\Livewire\Master\Kelurahan\CreateKelurahan;
use App\Livewire\Master\Kelurahan\EditKelurahan;
use App\Livewire\Master\Kelurahan\KelurahanList;
use App\Livewire\Master\Tps\TpsCreate;
use App\Livewire\Master\Tps\TpsCreateCreate;
use App\Livewire\Master\Tps\TpsCreateList;
use App\Livewire\Master\Tps\TpsEdit;
use App\Livewire\Master\Tps\TpsList;
use App\Livewire\User\CreateUser;
use App\Livewire\User\EditUser;
use App\Livewire\User\ListUser;
use App\Livewire\Votes\VotesList;
use Illuminate\Support\Facades\Auth;


Route::get('/', Login::class)->name('login');
Route::get('/login', Login::class)->name('login');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'You have been logged out.');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class);
    Route::get('/votes', VotesList::class);

    Route::get('/candidate', CandidateList::class);
    Route::get('/candidate/create', CreateCandidateList::class);
    Route::get('/candidate/{id}/edit', EditCandidateList::class);

    Route::get('/kelurahan', KelurahanList::class);
    Route::get('/kelurahan/create', CreateKelurahan::class);
    Route::get('/kelurahan/{id}/edit', EditKelurahan::class);

    Route::get('/kecamatan', KecamatanList::class);
    Route::get('/kecamatan/create', CreateKecamatan::class);
    Route::get('/kecamatan/{id}/edit', EditKecamatanList::class);

    Route::get('/tps', TpsList::class);
    Route::get('/tps/create', TpsCreate::class);
    Route::get('/tps/{id}/edit', TpsEdit::class);

    Route::get('/user', ListUser::class);
    Route::get('/user/create', CreateUser::class);
    Route::get('/user/{id}/edit', EditUser::class);
});
