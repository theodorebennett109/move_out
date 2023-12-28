<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Support\Facades\Validator;

use App\Models\CarRental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CarRentalController extends Controller
{
    /**
     * Display a listing of the car rentals on the dashboard.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $carRentals = CarRental::with('carModel')->get();
        return Inertia::render('Dashboard', ['carRentals' => $carRentals]);
    }

    /**
     * Show the form for creating a new car rental.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $models = CarModel::all();
        return Inertia::render('CreateRental', ['models' => $models]);
    }

    /**
     * Store a newly created car rental in the storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        try {
            // Validate the request data
            $validator = Validator::make(request()->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'tel_no' => 'required|string|max:20',
                'car_model' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'total' => 'required|numeric|gt:0',
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator);
            }

            // Validation passed, proceed to create CarRental
            $carRentalData = request()->all();
            $carRental = CarRental::create($carRentalData);

            // Send email
            $emailController = new EmailController();
            $emailController->sendPaymentRequestEmail($carRental);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            // Handle the exception or log it appropriately
            return back()->withInput()->withErrors(['error' => 'An error occurred while processing the request.']);
        }
    }
}