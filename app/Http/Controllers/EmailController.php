<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    function sendPaymentRequestEmail($carRental){
        $email = new MyEmail($carRental);
        $email->sendPaymentRequest();
        Mail::to($carRental->email)->send($email);
    }
}