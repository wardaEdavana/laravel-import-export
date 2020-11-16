<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;

/**
 * Class GamesController
 * @package Controller
 */

class GamesController extends Controller
{
	private $breadcrumbsTrail = ' >> ';

	/**
	 * To show the breadcrumbs
	 * @return view
	 */
    public function getBreadcrumbsTrail($category_id){

    	if(!is_numeric($category_id)){
    		return abort(404);
    	}

    	$ancestors = Games::ancestorsAndSelf($category_id)->toArray();
    	$ancestors = array_column($ancestors, 'name');
    
		$breadcrumbs = '';
        if(is_array($ancestors) && count($ancestors)){        	
        	$breadcrumbs = implode($this->breadcrumbsTrail, $ancestors);
        }
		return view('games', compact('breadcrumbs'));
         
    }
}
