<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use UserRepository;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('web.index');
    }
    
}
