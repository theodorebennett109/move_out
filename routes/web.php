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


$carRentals = [
    [
        'person' => [
            'name' => "Theodore Bennett",
            'address' => "12 Norbrook",
            'email' => "theodorebennett3@gmail.com",
            'number' => 2818357,
        ],
        'carModel' => "Benz",
        'ratePerDay' => 2000,
        'total' => 10000,
        'status' => "Pending",
        'invoiceNo' => 12211,
        'startDate' => '2023-01-02',
        'endDate' => '2023-01-07',
    ],
    [
        'person' => [
            'name' => "Alice Johnson",
            'address' => "24 Oak Street",
            'email' => "alice.johnson@example.com",
            'number' => 9876543,
        ],
        'carModel' => "Toyota",
        'ratePerDay' => 1500,
        'total' => 7500,
        'status' => "Approved",
        'invoiceNo' => 12212,
        'startDate' => '2023-01-03',
        'endDate' => '2023-01-09',
    ],
    [
        'person' => [
            'name' => "John Smith",
            'address' => "8 Elm Avenue",
            'email' => "john.smith@gmail.com",
            'number' => 5551234,
        ],
        'carModel' => "Ford",
        'ratePerDay' => 1800,
        'total' => 9000,
        'status' => "Completed",
        'invoiceNo' => 12213,
        'startDate' => '2023-01-05',
        'endDate' => '2023-01-12',
    ],
    [
        'person' => [
            'name' => "Emma Davis",
            'address' => "15 Maple Lane",
            'email' => "emma.davis@example.com",
            'number' => 4567890,
        ],
        'carModel' => "Honda",
        'ratePerDay' => 1700,
        'total' => 8500,
        'status' => "Pending",
        'invoiceNo' => 12214,
        'startDate' => '2023-01-08',
        'endDate' => '2023-01-14',
    ],
    [
        'person' => [
            'name' => "Oliver White",
            'address' => "5 Birch Street",
            'email' => "oliver.white@gmail.com",
            'number' => 1112233,
        ],
        'carModel' => "Chevrolet",
        'ratePerDay' => 1900,
        'total' => 9500,
        'status' => "Approved",
        'invoiceNo' => 12215,
        'startDate' => '2023-01-12',
        'endDate' => '2023-01-18',
    ],
    [
        'person' => [
            'name' => "Sophia Martin",
            'address' => "18 Pine Road",
            'email' => "sophia.martin@example.com",
            'number' => 7778888,
        ],
        'carModel' => "Nissan",
        'ratePerDay' => 1600,
        'total' => 8000,
        'status' => "Completed",
        'invoiceNo' => 12216,
        'startDate' => '2023-01-15',
        'endDate' => '2023-01-20',
    ],
    [
        'person' => [
            'name' => "Daniel Wilson",
            'address' => "3 Cedar Avenue",
            'email' => "daniel.wilson@gmail.com",
            'number' => 3334444,
        ],
        'carModel' => "Tesla",
        'ratePerDay' => 2200,
        'total' => 11000,
        'status' => "Pending",
        'invoiceNo' => 12217,
        'startDate' => '2023-01-18',
        'endDate' => '2023-01-23',
    ],
];


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