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

    public function payers(){
        return view('payers');
    }

    public function advertisers(){
        return view('advertisers');
    }

    public function ads(){
        return view('ads');
    }

    public function imageUpload(Request $request)
    {
        if ($request->images) {
            $image = $request->images;
            $imagesName = $image->getClientOriginalName();
            $path = base_path() . '/public/img';
            $image->move($path, $imagesName);
            return response()->json($imagesName);
        }
    }
}