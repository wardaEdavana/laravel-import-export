<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    // protected $guarded = [''];
    protected $fillable = ['make_name'];
    protected $table = 'makes';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

   
    /**
     * Get the vehicles.
     */
    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
}
