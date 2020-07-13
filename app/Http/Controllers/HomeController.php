<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function users()
    {
        return view('users');
    }

    public function convenience(){
    	return view('convenience');
    }

	public function qa(){
    	return view('qa');
    }
}