<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('breeds', BreedController::class);
    Route::resource('animals', AnimalController::class);
    Route::resource('medicines', MedicineController::class);
    Route::resource('treatments', TreatmentController::class);
    Route::resource('event_types', EventTypeController::class);
    Route::resource('events', EventController::class);

    Route::get('animals/{animal}/treatments', [AnimalController::class, 'showTreatments'])->name('animals.treatments');
    Route::get('/animals/{animal}/events', [AnimalController::class, 'showEvents'])->name('animals.events');

});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');


require __DIR__ . '/auth.php';
