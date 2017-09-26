<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeProducts;

class AdminController extends Controller
{
    public function getIndex(){

    	$type = TypeProducts::all();
    	return view('pages.index',compact('type'));
    	//return view('pages.index',['type'=>$type]);
    }
}
