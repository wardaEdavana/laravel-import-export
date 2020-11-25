<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 'vehicles';

    /**
     * Get the make that owns the Vehicle
     */
    public function Make()
    {
        return $this->belongsTo('App\Models\Make');
    }

    /**
     * Get the images
     */
    public function vehicle_images()
    {
        return $this->hasMany('App\Models\Image', 'vehicle_id');
    }

    /**
     * Get the vehicles.
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
