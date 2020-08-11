<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

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

    public function tinalab(){
        return view('tinalab');
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
