<?php

namespace App\Http\Controllers;

use App\Models\NestedSetModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryTestController
 * @package Controller
 */
class CategoryTestController extends Controller
{
	 /**
     * Show the categories using recursion method
     * @return view
     *
     */
    public function index()
    {
        $parentCategories = \App\Models\Category::where('parent_id',0)->get();

        return view('category', compact('parentCategories'));
    }
}
