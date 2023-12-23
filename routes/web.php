<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });



$carRentals =[
        ['person' => [
            'name'=> "Theodore Bennett",
            'address'=> "12 Norbrook",
            'email'=> "theodorebennett3@gmail.com",
            'number'=> 2818357],
        'carModel'=> "Benz",
        'ratePerDay'=> 2000,
        'total'=> 10000,
        'status'=> "Pending",
        'invoiceNo'=> 12211 ],

        ['person'=>[
            'name'=> "Alice Johnson",
            'address'=> "24 Oak Street",
            'email'=> "alice.johnson@example.com",
            'number'=> 9876543,
        ],
        'carModel'=> "Toyota",
        'ratePerDay'=> 1500,
        'total'=> 7500,
        'status'=> "Approved",
        'invoiceNo'=> 12212,
    ],
    [
        'person'=>[
            'name'=> "John Smith",
            'address'=> "8 Elm Avenue",
            'email'=> "john.smith@gmail.com",
            'number'=> 5551234,
        ],
        'carModel'=> "Ford",
        'ratePerDay'=> 1800,
        'total'=> 9000,
        'status'=> "Completed",
        'invoiceNo'=> 12213,
    ],
    [
        'person'=>[
            'name'=> "Emma Davis",
            'address'=> "15 Maple Lane",
            'email'=> "emma.davis@example.com",
            'number'=> 4567890,
        ],
        'carModel'=> "Honda",
        'ratePerDay'=> 1700,
        'total'=> 8500,
        'status'=> "Pending",
        'invoiceNo'=> 12214,
    ],
    [
        'person'=>[
            'name'=> "Oliver White",
            'address'=> "5 Birch Street",
            'email'=> "oliver.white@gmail.com",
            'number'=> 1112233,
        ],
        'carModel'=> "Chevrolet",
        'ratePerDay'=> 1900,
        'total'=> 9500,
        'status'=> "Approved",
        'invoiceNo'=> 12215,
    ],
    [
        'person'=>[
            'name'=> "Sophia Martin",
            'address'=> "18 Pine Road",
            'email'=> "sophia.martin@example.com",
            'number'=> 7778888,
        ],
        'carModel'=> "Nissan",
        'ratePerDay'=> 1600,
        'total'=> 8000,
        'status'=> "Completed",
        'invoiceNo'=> 12216,
    ],
    [
        'person'=>[
            'name'=> "Daniel Wilson",
            'address'=> "3 Cedar Avenue",
            'email'=> "daniel.wilson@gmail.com",
            'number'=> 3334444,
        ],
        'carModel'=> "Tesla",
        'ratePerDay'=> 2200,
        'total'=> 11000,
        'status'=> "Pending",
        'invoiceNo'=> 12217, ]];

    Route::get('/dashboard', function () use ($carRentals) {
    return Inertia::render('Dashboard',['carRentals' => $carRentals]);
})
// ->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';