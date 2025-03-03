<?php

use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::post('/generate-questions', [QuestionnaireController::class, 'create'])
    ->name('create-questions');

Route::get('/questions', [QuestionnaireController::class, 'show'])
    ->name('show-questions');

Route::get('/plan', [QuestionnaireController::class, 'showPlan'])
    ->name('show-plan');

Route::post('/store-answers', [QuestionnaireController::class, 'process'])
->name('store-answers');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
