<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $guarded = [];

    public function subcategory(){

        return $this->hasMany('App\Models\Category', 'parent_id');

    }
}
