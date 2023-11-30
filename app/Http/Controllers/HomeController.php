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

            $type = Auth()->user()->type;//get the type of user who's trying to log in.

            switch($type){
                case 'parent'://if the type is 'parent' then go to the dashboard page...
                    return view('index');
                    break;
                case 'tutor'://if the type is 'tutor' then go to the dashboard page...
                    break;
                case 'admin'://if the type is 'admin' then go to the administration page...
                    break;
                case 'owner':
                    break;
                default:
                    return redirect()->back();
            }
        }

    }
}
