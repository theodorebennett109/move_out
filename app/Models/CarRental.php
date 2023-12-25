<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarRental extends Model
{
    use HasFactory;
    protected $table = 'car-rental';
    protected $guarded = []; 

// CarRental.php (or your model file)
public function carModel()
{
    return $this->belongsTo(CarModel::class, 'car_model', 'model');
}

}