<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRental extends Model
{
    use HasFactory;
    protected $table = 'car-rental';
    protected $guard = []; 

    function carModel(){
        return $this->hasOne(CarModel::class,'model', "car_model");
    }
}