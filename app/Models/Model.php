<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
    use HasFactory;

    /**
     * Get the make that owns the Model
     */
    public function Make()
    {
        return $this->belongsTo('App\Models\Make');
    }
}
