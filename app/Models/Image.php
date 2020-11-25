<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
	protected $guarded = [''];
    protected $table = 'images';
    

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the vehicle that owns the image
     */
    public function vehicles()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }
}
