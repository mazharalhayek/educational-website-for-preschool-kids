<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if(Auth::id())
        {

            $type = Auth()->user()->type;//get the type of the user who's trying to log in.

            switch($type){
                case 'parent':
                    return view('index');
                    break;
                case 'tutor':
                    return view('index');
                    break;
                case 'admin':
                    return view('index');
                    break;
                default:
                    return view('404');
            }
        }

    }
}
