<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function users()
    {
        return view('users');
    }

    public function solutions(){
    	return view('solutions');	
    }

    public function convenience(){
    	return view('convenience');
    }

	public function tinalab(){
    	return view('tinalab');
    }
}