<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alergia;

class SearchController extends Controller
{
    
    public function alergias(Request $request){
		
    	$search = $request->term;
    	$alergias = Alergia::where('nombre','LIKE','%'.$search.'%')->get();
    	
    	$data = [];

    	foreach ($alergias as $key => $value) {
    		$data [] = ['id'=> $value->id, 'value'=> $value->nombre];		
    	}
    	return response($data);
 	}
 
}
